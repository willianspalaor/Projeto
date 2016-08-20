<?php

include_once BASE_LIBRARY . 'Router.php';
include_once BASE_LIBRARY . 'Request.php';

class App {

	private $request;
	private $router;

	public function __construct(){

		$this->request = new Request();
		$this->router  = new Router();	
	}

	public function run(){
		$this->router->run($this->request);
	}
}

