<?php

class ProductCategoryModel extends Model{

	public function __construct(){
		parent::__construct();
	}


	public function insert(ProductCategory $productCategory){

		$sql = 'INSERT INTO product_category(product_id, category_id) 
				VALUES (:product_id, :category_id)';

		$this->save($sql, $productCategory, 'getId');
	}


	public function update(ProductCategory $productCategory){

		$sql = 'UPDATE product_category SET product_id      = :product_id, 
								   			category_id     = :category_id
				WHERE product_category_id = :product_category_id AND
					  product_id 		  = :product_id';


		$params = array('product_category_id' => $productCategory->getId(),
						'product_id' 		  => $productCategory->getProduct());

		parent::save($sql, $productCategory, 'getId', $params);
	}


	public function delete(ProductCategory $productCategory){

		$sql = 'DELETE FROM product_category 
				WHERE  product_category_id = :product_category_id AND
					   product_id 		   = :product_id';

   		$params = array('product_category_id' => $productCategory->getId(),
						'product_id' 		  => $productCategory->getProduct());

				
		parent::delete($sql, $params);
	}


	public function findOne($params){

		$where = '';

		foreach($params as $key => $value){

			$where .= (!empty($where) ? ' AND ' : '') . $key . ' = :' . $key;
		}

		$sql = 'SELECT * FROM product_category WHERE ' . $where;

		$result = parent::findOne($sql, $params);

		if(!empty($result)){

  			$productCategory = new ProductCategory($result);
	  		return $productCategory;
	  	}

	  	return false;
	}


	public function findAll($field = null, $where = null){

		$field = empty($field) ? '*' : $field;
		$sql = 'SELECT ' . $field . ' FROM product_category ' . $where;

	  	$result = parent::findAll($sql);

	  	$categories = array();

	  	if(!empty($result)){

	  		foreach($result as $category){

	  			$categories[] = new ProductCategory($category);
	  		}
	  	}

	  	return $categories;		
	}


}