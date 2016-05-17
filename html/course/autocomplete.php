<?php

ini_set( 'display_errors', 1 );
//////default settings/////////////////
require_once("../../conf/config_menu.php");
require_once "../../class/course/PDODatabase.class.php";
require_once("../../class/course/jsClass.php");
//////////////////////////////////////

/////現在入力中の文字を取得//////////////////////////////
//$.getの場合、原則termで飛んでくるらしい
$term = (isset($_GET['term']) && is_string($_GET['term'])) ? $_GET['term'] : '';

///////////call classes///////////////////////////////////
//session_start();
$dbh = new PDODatabase(db_host, db_user, db_pass, db_name , db_type);
$table  = ' akino ';
$col    = ' kana ';
$where  = ' kana like "'. $term. '%" ';
//$where  = ' kana like "え%" ';
//$arrVal = ( $ctg_id !== '' ) ? array( $ctg_id) :array();
$data = $dbh->select($table,$col,$where);
//////////////////////////////////////////////////////////

// print_r($data);

/////検索用にカナの配列を作る///////////////////////////
$kanaArr = array();
foreach($data as $arr)
{
    foreach($arr as $key => $val)
    {
        if($key === "kana")
        {
            $kanaArr[] = $val;
        }
    }
};

/////飛んできたものとの一致を調べる///////////////
$words = array();

////部分一致で検索
//
foreach($kanaArr as $word){
    if(strpos( $word, $term) !== false){
        $words[] = $word;
    }
};

//$ctr->ePrint($words);
header("Content-Type: application/json; charset=utf-8");
echo json_encode($words);

?>
