<?php 

//htdocs/aki_integral/aki_integral/class/management/To_hash_class.php


class tohash{

public function to_hash($pass){
  $hashed = sha1($pass);
  return $hashed;
}
}

?>
