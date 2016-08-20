<?php

include_once BASE_LIBRARY . 'Session.php';

class Controller {

	private $view;
	private $layout;
	private $content;

	public function setLayout($layout){
    	$this->layout = BASE_PATH . '/views/layouts/' . $layout . '.php';
	}

	public function setView($view){
    	$this->view = BASE_PATH . 'views/scripts/' . $view . '.php';
	}

	public function loadPage(){
		include_once($this->layout);
	}

	public function authenticate($params){

		$session = Session::start();

		if(!empty($session)){

			if(Session::authenticate($params)){

				return true;
			}	
		}

		return false;
	}
}
