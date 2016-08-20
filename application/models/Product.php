<?php

class Product {

	private $id;
	private $tittle;
	private $description;
	private $price;
	private $discount;
	private $image;

	public function __construct($attrs){
		
		$this->id          = isset($attrs['product_id'])    	  ? $attrs['product_id']          : null;
		$this->tittle      = isset($attrs['product_tittle'])      ? $attrs['product_tittle'] 	  : null;
		$this->description = isset($attrs['product_description']) ? $attrs['product_description'] : null;
		$this->price       = isset($attrs['product_price']) 	  ? $attrs['product_price'] 	  : null;
		$this->discount    = isset($attrs['product_discount'])    ? $attrs['product_discount'] 	  : null;
		$this->image       = isset($attrs['product_image'])       ? $attrs['product_image']       : null;	
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

	public function setDescription($description){
		$this->description = $description;
	}

	public function getDescription(){
		return $this->description;
	}

	public function setPrice($price){
		$this->price = $price;
	}

	public function getPrice(){
		return $this->price;
	}

	public function setDiscount($discount){
		$this->discount = $discount;
	}

	public function getDiscount(){
		return $this->discount;
	}

	public function setImage($image){
		$this->image = $image;
	}

	public function getImage(){
		return $this->image;
	}

	public function toArray() {
		
		return array (
			'product_tittle'      => $this->tittle,
			'product_description' => $this->description,
			'product_price'	      => $this->price,
			'product_discount'    => $this->discount,
			'product_image'		  => $this->image
		);
	}

}