<?php

class ProductModel extends Model{

	public function __construct(){
		parent::__construct();
	}

	public function insert(Product $product){

		$sql = 'INSERT INTO product(product_tittle, product_description, product_price, product_discount, product_image) 
				VALUES (:product_tittle, :product_description, :product_price, :product_discount, :product_image)';

		$this->save($sql, $product, 'getId');
	}


	public function update(Product $product){

		$sql = 'UPDATE product SET product_tittle      = :product_tittle, 
								   product_description = :product_description,
								   product_price       = :product_price,
								   product_discount    = :product_discount,
								   product_image       = :product_image

				WHERE product_id = :product_id';


		$params = array('product_id' => $product->getId());

		parent::save($sql, $product, 'getId', $params);
	}


	public function delete(Product $product){

		$sql = 'DELETE FROM product 
				WHERE product_id = :product_id';

		$params = array('product_id' => $product->getId());
				
		parent::delete($sql, $params);
	}


	public function findOne($params){

		$where = '';

		foreach($params as $key => $value){

			$where .= (!empty($where) ? ' AND ' : '') . $key . ' = :' . $key;
		}

		$sql = 'SELECT * FROM product WHERE ' . $where;



		$result = parent::findOne($sql, $params);

		if(!empty($result)){

  			$product = new Product($result);
	  		return $product;
	  	}

	  	return false;
	}


	public function findAll($field = null, $where = null){

		$field = empty($field) ? '*' : $field;
		$sql = 'SELECT ' . $field . ' FROM product ' . $where;

	  	$result = parent::findAll($sql);

	  	$products = array();

	  	if(!empty($result)){

	  		foreach($result as $product){

	  			$products[] = new Product($product);
	  		}
	  	}

	  	return $products;		
	}
}