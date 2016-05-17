<?php

ini_set( 'display_errors', 1 );
//////default settings/////////////////
require_once("../../conf/config_menu.php");
require_once "../../class/course/PDODatabase.class.php";
require_once("../../class/course/jsClass.php");
//////////////////////////////////////

$detailId = $_GET["id"];

///////////call classes///////////////////////////////////
//session_start();
$dbh = new PDODatabase(db_host, db_user, db_pass, db_name , db_type);
$table  = ' akino ';
$col    = ' img, name, price, detail ';
$where  = ' id = '. $detailId. ' ';
//$where  = ' kana like "%t%" ';
//$arrVal = ( $ctg_id !== '' ) ? array( $ctg_id) :array();
$data = $dbh->select($table,$col,$where);
//////////////////////////////////////////////////////////

include_once('./detail.html');

?>
