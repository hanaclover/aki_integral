  <?php
/**
 * 各種DB操作
 * 
 * 主に DB処理
 *利用中ページ：menuEd.php / menuEditShow.php
 *By. Maya Sato
*/ 
class Item
{
	public $cateArr = array();
    public $dbh      = NULL;

    public function __construct( $dbh )
    {
        $this->dbh = $dbh;
    }      

  public function getItemList( $ctg_id )
    {
        //カテゴリーによって表示させるアイテムをかえる
        
        $table  = 'item';
        $col    = ' item_id, item_name,detail, price,image, ctg_id,delete_flg';
        $where  = ( $ctg_id !== '' ) ? '  ctg_id = ? ': '';
        $arrVal = ( $ctg_id !== '' ) ? array( $ctg_id) :array();
        
        $res = $this->dbh->select( $table, $col, $where, $arrVal );
        
        return ( $res !== false && count( $res ) !== 0 ) ? $res : false;
    }
	
	//表示の有無によって表示させるアイテムを変える
	public function getAllItemList( $delete_flg )
	{
		$table = 'item';
		$col = 'item_id,item_name';
		$where = ( $delete_flg !== '' ) ? '  delete_flg = ? ': '';
		$arrVal =  ( $delete_flg !== '' ) ? array( $delete_flg) :array();
		$res = $this->dbh->select( $table, $col, $where, $arrVal );
		$i = 0;
		echo '<form method="post" action="menuEditShow.php">';
			foreach ($res as $key => $value){
				$arr[$i] = array($value["item_id"] => $value["item_name"]);
				echo "<br>";
				echo  "<button type='submit' name='item_id' value='";
				echo $value["item_id"];
				echo "'>";
				echo  $value["item_name"];
				echo  "</button>";
				$i++;
				}
echo "</form>";				

 

	//			var_dump($arr);

        return ( $arr !== false && count( $arr ) !== 0 ) ? $res : false;
	}
	
	
       public function insCartData( $item_id,$item_name,$detail,$price,$image,$ctg_id,$delete_flg )
        {   
//			echo "<br>".$item_id.$item_name.$price.$image.$ctg_id."<br>";
            $table   = ' item ';
            $insData = array( 'item_id' => $item_id, 'item_name' =>$item_name, 'detail'=>$detail,'price' =>$price, 'image' =>$image, 'ctg_id' => $ctg_id,'delete_flg'=>$delete_flg);
			var_dump($insData);
            return $this->dbh->insert( $table, $insData );
        }

       public function delCartData( $item_id )
        {
            $table = ' item ';
            $insData = array( 'delete_flg'=> 1 );
            $where =' item_id = ? ';
            $arrWhereVal = array( $item_id );
            
            return $this->dbh->update( $table, $insData, $where, $arrWhereVal);
        }
		
		public function editData( $item_id,$item_name,$detail,$price,$image,$ctg_id,$delete_flg )
		{
			$table   = ' item ';
            $editData = array('item_id'=>$item_id,'item_name' =>$item_name, 'detail'=>$detail,'price' =>$price, 'image' =>$image, 'ctg_id' => $ctg_id, 'delete_flg' =>$delete_flg );
			$where =' item_id = ?';
            $arrWhereVal = array( $item_id );
			echo "<br>";
			var_dump($table);
			echo "<br>";
			var_dump($editData);
			echo "<br>";
			var_dump($where);
			echo "<br>";
			var_dump($arrWhereVal);
			echo "<br>";
			return $this->dbh->update( $table, $editData,$where, $arrWhereVal);
		}
}
		?>