<html>
<head>
<meta charset="UTF-8">
</head>
</html>
<?php
/*
 *
 * SeatModel.php
 * made by Hana,20160509
 *
*/
// テスト用
include_once("../../class/reserve/BaseModel.php");
include_once("../../class/reserve/PDODatabase.class.php");
include_once("../../class/reserve/init.php");
include_once("../../class/reserve/SeatModel.php");
$db = new PDODatabase();
$seat = new SeatModel($db);
$test = $seat->getSeat(28);
echo "<pre>";
var_dump($test);
echo "</pre>";
//

// echo $seat->getJointTableStartNum();
// var_dump($seat->getJointTableSID());

//for($i=2;$i<=3;$i++) {
//    $temps[]=$seat->conbination($i);
//}
//echo "<pre>";
//var_dump($temps);
//echo "</pre>";
//print "<ul>";
//foreach($temps as $tmp){
//    foreach($tmp as $temp) {
//    print "<li>".implode($temp)."</li>";
//}}
//print "</ul>";

