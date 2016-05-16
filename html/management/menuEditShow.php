<?php
/*
商品編集時に利用するファイル

保存してあったデータがフォームの中身として既に表示してありようにする処理を行う
まだ動き作ってません。。。
byさとまや
*/

include "./menuEdit.html";
include "../../conf/config.php";
require_once "../../class/management/PDODatabase.class.php";
require_once "../../class/management/DBController.class.php";

//$item = $value["item_id"];
//echo $_POST["hidden!"];
//var_dump('$_POST["example"]');

   if(isset($_POST["item_id"])) {
       $id = $_POST["item_id"];
       print("選択されたitem_id = $id<br>\n");
   }

?>