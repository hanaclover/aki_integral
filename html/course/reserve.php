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

include_once('./html/reserve.html');
$_SESSION["dish"] = $_COOKIE["cart"];

echo "セッションの中に".($_SESSION["dish"])."が入りましたよ";
?>
