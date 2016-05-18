<?php

 session_start();

if(!isset($_SESSION["UID"])){
  header("Location:../../html/top/logout.php");
  exit;
}

?>
