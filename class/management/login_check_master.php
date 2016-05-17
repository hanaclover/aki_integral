<?php

 session_start();

if(!isset($_SESSION["UID"]) || $_SESSION["TYPE"]!=="店長"){
  header("Location:logout.php");
  exit;
}

?>
