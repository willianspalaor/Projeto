<?php

class Category {

	private $id;
	private $tittle;
	private $parent;

	public function __construct($attrs){
		
		$this->id     = isset($attrs['category_id'])     ? $attrs['category_id']     : null ;
		$this->tittle = isset($attrs['category_tittle']) ? $attrs['category_tittle'] : null ;
		$this->parent = isset($attrs['category_parent']) ? $attrs['category_parent'] : null ;
	}

	public function getId(){
		return $this->id;
	}

	public function setTittle($tittle){
		$this->tittle = $tittle;
	}

	public function getTittle(){
		return $this->tittle;
	}

	public function setParent($parent){
		$this->parent = $parent;
	}

	public function getParent(){
		return $this->parent;
	}

	public function toArray() {
		return array (
			'category_tittle' =>  $this->tittle,
			'category_parent' =>  $this->parent
		);
	}

}