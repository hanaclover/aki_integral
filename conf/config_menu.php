<?php

if($_SERVER['HTTP_HOST'] == "aki-farm.angry.jp"){
	define("db_host", "mysql111.phy.lolipop.lan");
	define("db_user", "LAA0742776");
	define("db_pass", "Akifarm0519");
	define("db_name", "LAA0742776-akifarm");
}else{
  define("db_host", "localhost");
	define("db_user", "akino_user");
	define("db_pass", "akino_pass");
	define("db_name", "akino_db");
}

define("db_type", "mysql");
define("_DSN", db_type . ":host=" . db_host . ";dbname=" . db_name. ";charset=utf8");
?>
