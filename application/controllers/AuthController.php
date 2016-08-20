<?php

include_once BASE_PATH . 'models/userModel.php';

class AuthController extends Controller{

	public function index() {

		if($this->authenticate(array('user_email', 'user_pass'))){

			header('Location: /admin/index');
			exit;
		}

		$this->setLayout('layout-auth');
		$this->setView('auth/index');
		$this->loadPage();		
	}


	public function login() {

		if(empty($_POST)){

			header('Location: /auth/index');
			exit;
		}

		$params = array(
			'user_email' => $_POST['user_email'],
			'user_pass'	 => $_POST['user_pass'],
		);

		$user = (new UserModel)->findOne($params);

		if($user){

			Session::create($_POST);
			echo json_encode(array("status" => "true"));
	 		exit;
		}

		echo json_encode(array("status" => "false"));
	}


	public function logout(){
		Session::destroy();
		header('Location: /auth/index');
		exit;	
	}
}