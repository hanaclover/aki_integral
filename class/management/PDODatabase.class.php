<?php
/**
 * 各種DB 
 * 
 * 主に DB処理
 *利用中ページ：DBController.class.php / menuEd.php / menuEditShow.php
 *By. Maya Sato
 */
require_once "BaseModel.php";
class PDODatabase extends BaseModel{

 
        private  $db_host = "";
        private  $db_user = "";
        private  $db_pass = "";
        private  $db_name = "";
        private  $db_type = "";

        private  $order   = '';
        private  $limit   = '';
        private  $offset  = '';
        private  $groupby = '';

        // public function __construct( $db_host, $db_user, $db_pass, $db_name, $db_type )
        // {
             // //$this->dbh     = $this->db_connect( $db_host, $db_user, $db_pass, $db_name, $db_type );
            // // $this->db_host = $db_host;
            // // $this->db_user = $db_user;
            // // $this->db_pass = $db_pass;
            // // $this->db_name = $db_name;

            // //SQL関連
            // $this->order   = '';
            // $this->limit   = '';
            // $this->offset  = '';
            // $this->groupby = '';
        // }

//        private function connectDB( $db_host, $db_user, $db_pass, $db_name, $db_type)
//        {
//
//        	try{
//                switch( $db_type )
//                {
//               case 'mysql':
//                    $dsn = 'mysql:host='.$db_host.';dbname='.$db_name;
//            		$dbh = new PDO($dsn,$db_user,$db_pass);
//                    $dbh->query('SET NAMES utf8');
//                    break;

//                case 'pgsql':
//                    $dsn = 'pgsql:dbname='.$db_name.' host=' . $db_host .' port=5432';
//            		$dbh = new PDO($dsn,$db_user,$db_pass);
//                    break;
//            	}
//       	}
//        	catch(PDOException $e)
//        	{
//                var_dump($e->getMessage());
//                exit;
//        	}
            	
//           return $dbh;
//       }

        public function setQuery( $query='', $arrVal = array() )
        {
            $stmt = $this->dbh->prepare($query);
            $stmt->execute($arrVal);

        }


        public function select( $table, $column ='',$where = '', $arrVal = array())
        {
            $sql = $this->getSql( 'select', $table, $where, $column);
//			var_dump($table);
//			echo "<br>";
//			echo "<br>";
//			var_dump($sql);
//			echo "<br>";
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute($arrVal);
            
            //データを連想配列に格納
            $data = array();
            while($result = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                array_push($data , $result);
            }


            return $data;
        }

        public function count( $table, $where='', $arrVal=array())
        {
            $sql = $this->getSql('count',$table, $where );
            $stmt = $this->dbh->prepare($sql);

            $stmt->execute($arrVal);
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return intval($result['NUM']);
        }

        public function setOrder( $order ='' )
        {
            if( $strOrder !== '' ) $this->order = ' OREDER BY ' . $strOrder;
        }

        public function setLimitOff( $limit ='', $offset ='' )
        {
            if( $limit !== "" )  $this->limit = " LIMIT " . $limit ;

            if( $offset !== "" )  $this->offset = " OFFSET ". $offset ;

        }

        public function setGroupBy( $groupby )
        {
            if( $groupby !== "" ) $this->groupby = ' GROUP BY ' . $groupby;
        }


        private function getSql( $type,$table,$where='',$column='')
        {

            switch( $type )
            {
			//検索キーが指定されているかどうかを調べる
            case 'select':
                $columnKey =( $column !=='') ? $column : "*" ; 
                break;

            case 'count':
                $columnKey = 'COUNT(*) AS NUM ';
                break;

            default:
                break;
            }

			//検索条件が指定されているかどうかを調べる
            $whereSQL = ( $where !== '' )?' WHERE  ' . $where :'';

            $other = $this->groupby . "  " . $this->order ."  " . $this->limit . "  " . $this->offset;

            //sql文の作成
            $sql = " SELECT "
                 .      $columnKey 
                 . " FROM "
                 .      $table
                 .      $whereSQL
                 .      $other;
            
            return $sql;
        } 


        public function insert($table, $insData=array() )
        {
//         var_dump($insData);
            list( $preSt, $insDataVal, $columns) = $this->getPreparedStatement( 'insert', $insData, $table );
//             var_dump($insData);
             $sql = " INSERT INTO " . $table . " (" 
                  .      $columns 
                  . ") VALUES (" 
                  .      $preSt 
                  . ") " ;
          //var_dump($insDataVal);
            $stmt = $this->dbh->prepare( $sql );
		//	var_dump($sql);
		//	var_dump($insDataVal);
            $res  = $stmt->execute($insDataVal);
			var_dump($res);
            return $res;
        }

        public function update($table ,$insData = array() ,$where, $arrWhereVal=array())
        {
            list( $preSt, $insDataVal) = $this->getPreparedStatement( 'update', $insData, $table );
            
            //sql文の作成
            $sql = " UPDATE "
                 .      $table
                 . " SET "
                 .      $preSt
                 . " WHERE "
                 .      $where ;
            //var_dump($sql);
            $updateData = array_merge($insDataVal,$arrWhereVal);
            $stmt       = $this->dbh->prepare( $sql );
            $res        = $stmt->execute($updateData);
            
            return $res ;
        }

        public function getPreparedStatement( $mode, $insData, $table )
        {
           
            if( !empty($insData) )
            {

                $insDataKey = array_keys($insData);
                $insDataVal = array_values($insData);
                $preCnt     = count( $insDataKey );
                switch( $mode )
                {
                case 'insert':

                    $columns  = implode(",",$insDataKey);
                    $arrPreSt = array_fill( 0, $preCnt,'?');
					//var_dump($arrPreSt);
                    $preSt    = implode(",",$arrPreSt);
                        
                    return array($preSt, $insDataVal, $columns);

                    break;

                case 'update':
                    
                    for( $i=0;$i < $preCnt; $i++ )
                    {
                        $arrPreSt[$i] = $insDataKey[$i] ." =? ";
                    }
                    
                    $preSt =implode(",",$arrPreSt);

                    return array($preSt, $insDataVal);
                 
                    break;
                }

            }
            else
            {
                return false;
            }
        
        }

        public function getLastId()
        {
            return $this->dbh->lastInsertId(); 
        }
}
