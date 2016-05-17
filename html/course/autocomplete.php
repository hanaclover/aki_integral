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
$where  = ' kana like "%'. $term. '%" ';
//$where  = ' kana like "%t%" ';
//$arrVal = ( $ctg_id !== '' ) ? array( $ctg_id) :array();
$data = $dbh->select($table,$col,$where);
//////////////////////////////////////////////////////////

//print_r($data);
$namrArr = Array();
foreach($data as $arr1){
    $nameArr[] = $arr1["kana"];
};

//print_r($nameArr);
$nameArr2 = array();
foreach($nameArr as $nameArr3){
    $nameArr2[] = explode("/", $nameArr3);
};

//print_r($nameArr2);
$nameArrTrue = array();

foreach($nameArr2 as $arr){
    foreach($arr as $val){
        if(strpos($val, $term) === 0){
            $nameArrTrue[] = $val;
    };
    }
};

//print_r($nameArrTrue);


/////検索用にカナの配列を作る///////////////////////////
$kanaArr = array();
foreach($nameArrTrue as $val)
{
        $kanaArr[] = $val;
};

/*
/////飛んできたものとの一致を調べる///////////////
$words = array();
 
////部分一致で検索
//
foreach($kanaArr as $word){
    if(strpos( $word, $term) !== false){
        $words[] = $word;
    }   
};
 */

//$ctr->ePrint($words);
header("Content-Type: application/json; charset=utf-8");
echo json_encode($kanaArr);

?>
