<?php

include_once BASE_PATH . 'models/Category.php';
include_once BASE_PATH . 'models/CategoryModel.php';

class CategoryController extends Controller{

	public function index(){

		$this->setLayout('layout-admin');
		$this->setView('category/index');
		$this->loadPage();
	}

	public function createCategory(){

		if(!empty($_POST)){

			$categoryModel = new CategoryModel();
			$categoryModel->insert(new Category($_POST));
			unset($_POST);
		}
	}

	public function updateCategory(){

		if(!empty($_POST)){

			$categoryModel = new CategoryModel();
			$categoryModel->update(new Category($_POST));
			unset($_POST);
		}
	}

	public function deleteCategory(){

		if(!empty($_POST)){

			$categoryModel = new CategoryModel();
			$categoryModel->delete(new Category($_POST));
			unset($_POST);
		}
	}


	public function getCategory(){

		if(!empty($_POST)){

			$category = (new CategoryModel)->findOne(array('category_id' => $_POST['category_id']));

			$result = array('category_id'     => $category->getId(),
							'category_tittle' => $category->getTittle(),
							'category_parent' => $category->getParent());

			echo json_encode($result);
		}
	}


	public function getCategories($field = null){

		$result = (new CategoryModel)->findAll($field);
		return $result;
	}


	public function getMainCategories(){

		$categoryModel = new CategoryModel();
		$categories = $categoryModel->findAll(null, 'WHERE category_parent IS NULL');

		return $categories;
	}


	public function getTittleParent($parent){

		$tittle = '';

		if (!empty($parent)){

			$category = (new CategoryModel)->findOne(array('category_id' => $parent));

			if(!empty($category))
				$tittle = $category->getTittle();
		}
		
		return $tittle;
	}

}