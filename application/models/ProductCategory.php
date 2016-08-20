<?php

class ProductCategory {

	private $id;
	private $product;
	private $category;

	public function __construct($attrs){
		
		$this->id          = isset($attrs['product_category_id']) ? $attrs['product_category_id'] : null;
		$this->product     = isset($attrs['product_id'])     	  ? $attrs['product_id'] 	      : null;
		$this->category    = isset($attrs['category_id'])  	      ? $attrs['category_id']    : null;
	}

	public function getId(){
		return $this->id;
	}

	public function setProduct($product){
		$this->product = $product;
	}

	public function getProduct(){
		return $this->product;
	}

	public function setCategory($category){
		$this->category = $category;
	}

	public function getCategory(){
		return $this->category;
	}

	public function toArray() {
		
		return array (
			'product_id'  => $this->product,
			'category_id' => $this->category
		);
	}

}