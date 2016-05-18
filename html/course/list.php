<?php

ini_set( 'display_errors', 1 );
//////default settings/////////////////
require_once("../../conf/config_menu.php");
require_once "../../class/course/PDODatabase.class.php";
require_once("../../class/course/jsClass.php");
//////////////////////////////////////

///////////call classes///////////////////////////////////
//session_start();
$dbh = new PDODatabase(db_host, db_user, db_pass, db_name , db_type);
$table  = ' akino ';
$col    = ' img, name, price, detail, category, id, kana ';
//$where  = ( $ctg_id !== '' ) ? '  ctg_id = ? ': '';
//$arrVal = ( $ctg_id !== '' ) ? array( $ctg_id) :array();
$data = $dbh->select($table,$col);
//////////////////////////////////////////////////////////

//オススメ商品をつくるとこ////////////////////////////////
$nameArr = array();
foreach($data as $arr){
    foreach($arr as $key => $val){
        if($key === "name"){
            $nameArr[rand(0, 999)] = $val;
        }
    }
};
krsort($nameArr);
//ここに上から3つはいってる
$randomMenu = array_splice($nameArr, 0, 3);
//print_r($randomMenu);
/////////////////////////////////////////////////////////

include_once('./list.html');

?>
