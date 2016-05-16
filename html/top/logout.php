<?php
//パス
//htdocs/aki_integral/aki_integral/html/top/logout.php

require_once("../../class/management/login_check.php");

$_SESSION = array();

if (isset($_COOKIE[session_name()])){
    setcookie(session_name(), '', time()-42000, '/');
}

session_destroy();

?>

<html>
 <head>
  <meta charset = "utf-8"/>
  <title> logout </title>
 </head>
 <body>
 <h1> ログアウトしました。 </h1><br>
 <a href="test.php">ホームに戻る</a><br>
 </body>
</html>
