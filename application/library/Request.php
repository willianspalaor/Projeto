<?php

class Request {

	private $controller;
	private $action;
	private $args;

	public function __construct() {
		
		$url = $_SERVER['REQUEST_URI'];
		
	   	if (!isset($url)) return false;
	   
	    $segments = explode("/", $url);
	    array_shift($segments);
    
	    $this->controller = ($controller = array_shift($segments)) ? $controller : "home";
	    $this->action     = ($action = array_shift($segments)) ? $action : "index";
	    $this->args 	  = (is_array($segments)) ? $segments : array();
	}

	public function getController(){
		return $this->controller;
	}

	public function getAction(){
		return $this->action;
	}

	public function getArgs(){
		return $this->args;
	}
}