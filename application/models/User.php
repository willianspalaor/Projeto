<?php

class User {

	private $id;
	private $name;
	private $email;
	private $pass;

	public function __construct($attrs){

		$this->id    = isset($attrs['user_id'])    ? $attrs['user_id']    : null;
		$this->name  = isset($attrs['user_name'])  ? $attrs['user_name']  : null;
		$this->email = isset($attrs['user_email']) ? $attrs['user_email'] : null;
		$this->pass  = isset($attrs['user_pass'])  ? $attrs['user_pass']  : null;
	}

	public function setId(){
		return $this->id;
	}

	public function getId(){
		return $this->id;
	}

	public function setName($name){
		$this->name = $name;
	}

	public function getName(){
		return $this->name;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setPass($pass){
		$this->pass = $pass;
	}
	
	public function getPass(){
		return $this->pass;
	}

	public function toArray() {
		return array (
			'user_name'  => $this->name,
			'user_email' => $this->email,
			'user_pass'  => $this->pass
		);
	}

}