<?php

/**
 * Description of Auth
 *
 * @author AKI
 */
class BaseModel {
    
    protected $dbh;
            
    public function __construct() {
        $this->db_connect();
    }

    //----------------------------------------------------
    // データベース接続
    //----------------------------------------------------
    public function db_connect(){
        try {
          $this->dbh = new PDO(_DSN, _DB_USER, _DB_PASS);
          $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $this->dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch(PDOException $Exception) {
          die('エラー :' . $Exception->getMessage());
        }
    }


    
    
}

?>
