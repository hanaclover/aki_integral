<?php

//////default settings/////////////////
require_once("../../conf/config.php");
require_once("../../class/course/dbClass.php");
require_once("../../class/course/sessionClass.php");
require_once("../../class/course/cartClass.php");
require_once("../../class/course/listControlClass.php");
require_once("../../class/course/jsClass.php");
//////////////////////////////////////

///////////call classes///////////////////////////////////
session_start();
$ctr = new control(db_host, db_user, db_pass, db_name );
//$cart = new cart("cart");
//$cart->checkSession();
$data = $ctr->allSelect();
//////////////////////////////////////////////////////////

/*
require_once("ifGET.php");
require_once("sort_search.php");
require_once("escape.php");
 */

$ctr->close();

//$cnt = count($_SESSION["cart"]);

include_once('./reserve.html');

$arrId = $_COOKIE["cart"];
$nameChange = array();

print_r($arrId);

$arrId2 = explode(" ", $arrId);

print_r($arrId2);

foreach($data as $arr){
    foreach($arr as $key => $val){
        foreach($arrId as $id){
            if($val === $id){
                array_push($nameChange, $arr);
            }
        }
    }
};

var_dump($nameChange);

//$_SESSION["dish"] = $nameChange;

echo "セッションの中に".($_SESSION["dish"])."が入りましたよ";

?>
