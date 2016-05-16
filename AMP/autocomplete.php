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

/////���ݓ��͒��̕������擾//////////////////////////////
//$.get�̏ꍇ�A����term�Ŕ��ł���炵��
$term = (isset($_GET['term']) && is_string($_GET['term'])) ? $_GET['term'] : '';

//�J�i�őO����v����/////////////////////////////////
$data = $ctr->autocomplete($term);
$ctr->close();

/////�����p�ɃJ�i�̔z������///////////////////////////
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

/////���ł������̂Ƃ̈�v�𒲂ׂ�///////////////
$words = array();
 
////������v�Ō���
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
