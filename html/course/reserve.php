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
$ctr = new control(db_host, db_user, db_pass, db_name );
$cart = new cart("cart");
$cart->checkSession();
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
$_SESSION["dish"] = $_COOKIE["cart"];

echo "セッションの中に".($_SESSION["dish"])."が入りましたよ";
?>
