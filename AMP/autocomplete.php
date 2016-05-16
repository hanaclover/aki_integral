<?php

//////default settings/////////////////
require_once("config.php");
require_once("./class/dbClass.php");
require_once("./class/sessionClass.php");
require_once("./class/cartClass.php");
require_once("./class/listControlClass.php");
require_once("./class/jsClass.php");
//////////////////////////////////////

///////////call classes///////////////////////////////////
$ctr = new control( db_host, db_user, db_pass, db_name );
/////////////////////////////////////////////////////////

/////現在入力中の文字を取得//////////////////////////////
//$.getの場合、原則termで飛んでくるらしい
$term = (isset($_GET['term']) && is_string($_GET['term'])) ? $_GET['term'] : '';

//カナで前方一致検索/////////////////////////////////
$data = $ctr->autocomplete($term);
$ctr->close();

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
