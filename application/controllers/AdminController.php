<?php

class AdminController extends Controller{

	public function index() {

        $teste = 1;

        if($this->authenticate(array('user_email', 'user_pass'))){
			
			$this->setLayout('layout-admin');
			$this->setView('admin/index');
			$this->loadPage();
			exit;
		}

		header('Location: /auth/index');			
	}
}
