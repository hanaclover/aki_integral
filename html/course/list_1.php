<?php
$_SESSION["dish"] = $_COOKIE["cart"];

echo "セッションの中に".($_SESSION["dish"])."が入りましたよ";
?>

