<?php

class Session {

	public function create($params){

		session_start();

		foreach($params as $key => $value){
			$_SESSION[$key] = $value;
		} 				
	}

	public function start(){

		session_start();
		return $_SESSION;
	}


	public function destroy(){

		session_start();
		session_destroy();	
	}

	public function authenticate($params){

		foreach($params as $key){

			if(!isset($_SESSION[$key])){
				return false;
			}
		}

		return true;	
	}
}