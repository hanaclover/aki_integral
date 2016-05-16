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

$ctr->close();

include_once('./list.html');

?>
