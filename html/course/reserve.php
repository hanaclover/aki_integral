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
$col    = '';
//$where  = ( $ctg_id !== '' ) ? '  ctg_id = ? ': '';
//$arrVal = ( $ctg_id !== '' ) ? array( $ctg_id) :array();
$data = $dbh->select($table,$col);
//////////////////////////////////////////////////////////

$strId = $_COOKIE["cart"];
$deleteWord = array('[', ']', '"');
$strIdClean = str_replace($deleteWord, "", $strId);
$arrId2 = explode(",", $strIdClean);
$arrId3 = array();
$arrId4 = array();

foreach($data as $arr){
    foreach($arr as $key => $val){
        if($key === "id" && in_array($val, $arrId2)){
            $arrId3[] = $arr;
        }
    }
};

foreach($arrId3 as $arr1){
    foreach($arr1 as $key1 => $val1){
        if($key1 === "name"){
            $arrId4[] = $val1;
        }
    }
};

$_SESSION["dish"] = $arrId4;

echo "セッションの中に";
print_r($_SESSION["dish"]);
echo "が入りましたよ";

include_once('./reserve.html');

?>
