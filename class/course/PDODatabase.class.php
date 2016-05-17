<?php

class PDODatabase{

        private  $dbh     = NULL;
        private  $db_host = "";
        private  $db_user = "";
        private  $db_pass = "";
        private  $db_name = "";
        private  $db_type = "";

        private  $order   = '';
        private  $limit   = '';
        private  $offset  = '';
        private  $groupby = '';

        public function __construct( $db_host, $db_user, $db_pass, $db_name, $db_type )
        {
            $this->dbh     = $this->connectDB( $db_host, $db_user, $db_pass, $db_name, $db_type );
            $this->db_host = $db_host;
            $this->db_user = $db_user;
            $this->db_pass = $db_pass;
            $this->db_name = $db_name;

            //SQL関連
            $this->order   = '';
            $this->limit   = '';
            $this->offset  = '';
            $this->groupby = '';
        }

        private function connectDB( $db_host, $db_user, $db_pass, $db_name, $db_type)
        {

        	try{
                switch( $db_type )
                {
                case 'mysql':
                    $dsn = 'mysql:host='.$db_host.';dbname='.$db_name;
            		$dbh = new PDO($dsn,$db_user,$db_pass);
                    $dbh->query('SET NAMES utf8');
                    break;

                case 'pgsql':
                    $dsn = 'pgsql:dbname='.$db_name.' host=' . $db_host .' port=5432';
            		$dbh = new PDO($dsn,$db_user,$db_pass);
                    break;
            	}
        	}
        	catch(PDOException $e)
        	{
                var_dump($e->getMessage());
                exit;
        	}

            return $dbh;
        }


        public function setQuery( $query='', $arrVal = array() )
        {
            $stmt = $this->dbh->prepare($query);
            $stmt->execute($arrVal);

        }


        public function select( $table, $column ='',$where = '', $arrVal = array())
        {
          //var_dump($this);
            $sql = $this->getSql( 'select', $table, $where, $column);


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

        private function getSql( $type,$table,$where='',$column='')
        {

            switch( $type )
            {
            case 'select':
                $columnKey =( $column !=='') ? $column : "*" ;
                break;

            case 'count':
                $columnKey = 'COUNT(*) AS NUM ';
                break;

            default:
                break;
            }

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
}
?>
