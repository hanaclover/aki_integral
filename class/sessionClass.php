<?php

class session {

	protected $sessionId;
	protected $sessionKey;
	
	public function __construct($key){
		session_start();
		$this->sessionId = session_id();
		$this->sessionKey = $key;
	}

	public function set(){
		if(empty($_SESSION[$this->sessionKey])){
			$_SESSION[$this->sessionKey] = array();
		}
		//return $_SESSION[$this->sessionKey]; 
	}
//前にここを訪れたかどうか
//訪れていた場合:_session[key]のvalを配列に格納する
	public function checkSession(){
		if (empty($_SESSION[$this->sessionKey])){
			//echo "first time!!!!";	
			$_SESSION[$this->sessionKey] = array();
			//$val = $_SESSION[$this->sessionKey] ; 
			//return $val;
		}else{ 
			//echo "agein thank you!!!!!!!!!";
	    	//$val = $_SESSION[$this->sessionKey] ; 
		    //return $val;
		}
	}
	
//配列の中身に変更があった場合にsessionに値を再格納
	public function updateSession($arr){
		$_SESSION[$this->sessionKey] = $arr ;
		//return $_SESSION[$this->sessionKey] ;
	}

	public function sessionDestroy(){
		session_destroy();
	}
}

?>
