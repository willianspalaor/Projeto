<?php

class CategoryModel extends Model{

	public function __construct(){
		parent::__construct();
	}

	public function insert(Category $category){

		$sql = 'INSERT INTO category(category_tittle, category_parent) 
				VALUES (:category_tittle, :category_parent)';

		$this->save($sql, $category, 'getId');
	}


	public function update(Category $category){

		$sql = 'UPDATE category SET category_tittle = :category_tittle, 
								 	category_parent = :category_parent
				WHERE category_id = :category_id';
		

		$params = array('category_id' => $category->getId());	

		parent::save($sql, $category, 'getId', $params);
	}


	public function delete(Category $category){

		$sql = 'DELETE FROM category 
				WHERE category_id = :category_id';

		$params = array('category_id' => $category->getId());	
				
		parent::delete($sql, $params);
	}


	public function findOne($params){

		$where = '';

		foreach($params as $key => $value){

			$where .= (!empty($where) ? ' AND ' : '') . $key . ' = :' . $key;
		}

		$sql = 'SELECT * FROM category WHERE ' . $where;

		$result = parent::findOne($sql, $params);

		if(!empty($result)){

  			$category = new Category($result);
	  		return $category;
	  	}

	  	return false;
	}


	public function findAll($field = null, $where = null){

		$field = empty($field) ? '*' : $field;
		$sql = 'SELECT ' . $field . ' FROM category ' . $where;

	  	$result = parent::findAll($sql);

	  	$categories = array();

	  	if(!empty($result)){

	  		foreach($result as $category){

	  			$categories[] = new Category($category);
	  		}
	  	}

	  	return $categories;		
	}

}