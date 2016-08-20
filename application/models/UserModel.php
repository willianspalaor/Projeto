<?php

include_once BASE_PATH . '/models/User.php';

class UserModel extends Model{

	public function __construct(){
		parent::__construct();
	}

	public function findOne($params){

		$sql = 'SELECT * FROM user 
				WHERE user_email = :user_email AND
					  user_pass  = :user_pass';	

	  	$result = parent::findOne($sql, $params);

	  	if(!empty($result)){

	  		$user = new User($result);
	  		return $user;
	  	}

	  	return false;
	}

}