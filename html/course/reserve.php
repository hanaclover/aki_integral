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

$arrId = $_COOKIE["cart"];
$nameChange = array();

var_dump($arrId);

$arrId2 = explode(" ", $arrId);

//print_r($arrId2);

/*foreach($data as $arr){
    foreach($arr as $key => $val){
        foreach($arrId as $id){
            if($val === $id){
                array_push($nameChange, $arr);
            }
        }
    }
};
 */

//var_dump($nameChange);

//$_SESSION["dish"] = $nameChange;

echo "セッションの中に".($_SESSION["dish"])."が入りましたよ";

include_once('./reserve.html');

?>
