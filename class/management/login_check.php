<?php

 session_start();

if(!isset($_SESSION["USERID"])){
  header("Location:../../html/top/logout.php");
  exit;
}

?>
