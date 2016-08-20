<?php

class Stock {

	private $id;
	private $quantity;
	private $product;

	public function __construct($attrs){
		
		$this->id       = isset($attrs['stock_id'])    	  ? $attrs['stock_id']       : null;
		$this->quantity = isset($attrs['stock_quantity']) ? $attrs['stock_quantity'] : null;
		$this->product  = isset($attrs['product_id'])     ? $attrs['product_id']     : null;
	}

	public function getId(){
		return $this->id;
	}

	public function setQuantity($quantity){
		$this->quantity = $quantity;
	}

	public function getQuantity(){
		return $this->quantity;
	}

	public function setProduct($product){
		$this->product = $product;
	}

	public function getProduct(){
		return $this->product;
	}

	public function toArray() {
		
		return array (
			'stock_quantity' => $this->quantity,
			'product_id'	 => $this->product
		);
	}

}