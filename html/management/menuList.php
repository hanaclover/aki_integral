<?php
/*
管理画面の中の商品編集トップページ
商品情報のデータベースから情報を引いてきて表示する処理

現状たこわさボタンと新規追加ボタン以外は動作しません。
by.さとまや
*/


include "./menuList.html";
include '../../conf/config_menuEdit.php';
require_once "../../class/management/PDODatabase.class.php";
require_once "../../class/management/DBController.class.php";

try{
	//データベースに接続する
$dbh = new PDODatabase(_DB_HOST, _DB_USER, _DB_PASS, _DB_NAME , _DB_TYPE);
	//SQL文を発行して、ログイン・パスワードが適切かどうかを確認
	
}catch(Exception $e){
	exit($e->getMessage());
}

//表示中の商品の全てをボタン化して表示
$itm    = new Item( $dbh );
$delete_flg=0;
echo "<br><br>";
echo "表示中リスト";
$item_data = $itm->getAllItemList($delete_flg);

//非表示中の商品の全てをボタン化して表示
echo "<br><br>";
echo "非表示中リスト";
$delete_flg=1;
$item_data = $itm->getAllItemList($delete_flg);

//echo "<h3>表示中リスト</h3>";
//echo "<pre>";
//var_dump($item_data);
//echo "</pre>";
//foreach($item_data as $key => $value){
//	echo "<br><br>";

//	echo($item_data[0]);
//	$i++;
//}

//echo "<pre>";
//var_dump($item_data);
//echo "</pre>";


//var_dump($item_data);
//echo "<br><br>";
//foreach ($item_data as $key => $value){
//	$obj->item_id = $key;
//}
//var_dump($key);

//array_keys($itm->getAllItemList($delete_flg));
//var_dump($itm);
//$item_id = 1;
//insertしてくれる関数に飛ばす
//$ins = $itm->editData($item_id,htmlspecialchars($_POST["item_name"]),htmlspecialchars($_POST["detail"]),htmlspecialchars($_POST["price"]), $_FILES["image"]["name"],htmlspecialchars($_POST["ctg_id"]),htmlspecialchars($_POST["delete_flg"]));
?>