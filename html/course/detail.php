<?php

//////default settings/////////////////
require_once("../../conf/config_menu.php");
require_once("../../class/course/dbClass.php");
require_once("../../class/course/sessionClass.php");
require_once("../../class/course/cartClass.php");
require_once("../../class/course/listControlClass.php");
require_once("../../class/course/jsClass.php");
//////////////////////////////////////

///////////call classes///////////////////////////////////
$db = new Database( db_host, db_user, db_pass, db_name );
$cart = new cart("cart");
$cart->checkSession();
//////////////////////////////////////////////////////////

print_r($_GET["id"]);

require_once("ifGETname.php");

print_r($data);

$db->close();

/////HMJからとんできたレコメンドをソート/////////////
/*$name_arr = array();
$num = array();
foreach($mhj2 as $arr)
{
    foreach($arr as $key => $val)
    {
        if($key === "name")
        {
            if(!isset($num[$val])){$num[$val] = 0;};
            $num[$val] += 1;
        }
    }
};
 */
/////////////////////////////////////////////////////
/*
arsort($num);

echo "<pre>";
echo "昇順ソート <br/>";
var_dump($num);
echo "</pre>";
 */
//////////////////////////////////////////////////////

include_once('./detail.html');

?>
