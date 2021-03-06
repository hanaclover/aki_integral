<?php
/**
 * Created by PhpStorm.
 * User: Owner
 * Date: 2016/05/13
 * Time: 17:26
 */
require_once "../../class/reserve/PDODatabase.class.php";
require_once "../../class/reserve/ReserveModel.php";
require_once "../../class/reserve/Reserve.php";
require_once "../../class/reserve/SeatModel.php";

$sid = $_GET["sid"];
$rm = new ReserveModel();
$sm = new SeatModel(new PDODatabase());
$res = new Reserve();
//confirmReserveを追加してください
$res->setSID($sid);
$res->setStartDay(date("Y-m-d"));
$res->setStartTime(date("H:i:s",strtotime(date("H:i:s"))+3600*7));
if ($rm->getReserve($sm->getSeatNumfromSID($sid))["flag"] == 0) {
    $rm->setReserve($res);
    echo "入店を受け付けました";
}else{
    echo "席が予約されておりますので、\n予約できません";
}
