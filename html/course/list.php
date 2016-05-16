<?php

ini_set( 'display_errors', 1 );
//////default settings/////////////////
require_once("../../conf/config_menu.php");
//require_once("../../class/course/dbClass.php");
//require_once("../../class/course/sessionClass.php");
//require_once("../../class/course/cartClass.php");
//require_once("../../class/course/listControlClass.php");
//require_once "../../class/course/BaseModel.php";
require_once "../../class/course/PDODatabase.class.php";
require_once("../../class/course/jsClass.php");
//////////////////////////////////////

///////////call classes///////////////////////////////////
//session_start();
//$ctr = new control(db_host, db_user, db_pass, db_name );
//$data = $ctr->allSelect();
$dbh = new PDODatabase(db_host, db_user, db_pass, db_name , db_type);

$table  = ' akino ';
$col    = ' img, name, price, detail, category, id, kana ';
//$where  = ( $ctg_id !== '' ) ? '  ctg_id = ? ': '';
//$arrVal = ( $ctg_id !== '' ) ? array( $ctg_id) :array();
$data = $dbh->select($table,$col);
//////////////////////////////////////////////////////////

//$ctr->close();

include_once('./list.html');

?>
