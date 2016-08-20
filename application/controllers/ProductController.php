<?php

include_once BASE_PATH . 'models/Product.php';
include_once BASE_PATH . 'models/ProductModel.php';
include_once BASE_PATH . 'models/Category.php';
include_once BASE_PATH . 'models/CategoryModel.php';
include_once BASE_PATH . 'models/ProductCategory.php';
include_once BASE_PATH . 'models/ProductCategoryModel.php';
include_once BASE_PATH . 'models/Stock.php';
include_once BASE_PATH . 'models/StockModel.php';


class ProductController extends Controller {

	public function index(){

		$this->setLayout('layout-admin');
		$this->setView('product/index');
		$this->loadPage();
	}


	public function createProduct(){

		if(!empty($_POST)){


			/* Insert table product */

			$productModel = new ProductModel();
			$product      = new Product($_POST);

			if(!empty($_POST['product_image'])){

				$img = 'uploads/product/' . $_POST['product_image'];
				$product->setImage($img);
			}

			$productModel->insert($product);


			/* Insert table stock */

			$stockModel = new StockModel();
			$stock      = new Stock($_POST);

			$stock->setProduct($productModel->getLastId());
			$stockModel->insert($stock);


			/* Insert table product_category */

			$productCategoryModel = new ProductCategoryModel();
			$categories = explode("," ,$_POST['product_category']);

			foreach($categories as $category){

				$productCategory = new ProductCategory($_POST);
				$productCategory->setCategory($category);
				$productCategory->setProduct($productModel->getLastId());
				$productCategoryModel->insert($productCategory);
			}

			unset($_POST);
		}
	}


	public function updateProduct(){

		if(!empty($_POST)){


			/* update table product */

			$productModel = new ProductModel();
			$product = new Product($_POST);

			if(!empty($_POST['product_image'])){

				$img = 'uploads/product/' . $_POST['product_image'];
				$product->setImage($img);
			}

			$productModel->update($product);


			/* update table stock */

			$stockModel = new StockModel();
			$stock = $stockModel->findOne(array('product_id' => $_POST['product_id']));
			$stock->setQuantity($_POST['stock_quantity']);
			$stockModel->update($stock);


			/* update table product_category */

			$productCategoryModel = new ProductCategoryModel();
			$productCategory = $productCategoryModel->findAll(null, 'WHERE product_id = ' . $_POST['product_id']);

			foreach($productCategory as $category){

				$productCategoryModel->delete($category);
			}

			$categories = explode("," ,$_POST['product_category']);

			foreach($categories as $category){

				$productCategory = new ProductCategory($_POST);
				$productCategory->setCategory($category);
				$productCategoryModel->insert($productCategory);
			}
			
			unset($_POST);
		}
	}


	public function deleteProduct(){

		if(!empty($_POST)){

	
			/* Delete from table stock */

			$stockModel = new StockModel();
			$stockModel->delete(new Stock($_POST));


			/* Delete from table productCategory */

			$productCategoryModel = new ProductCategoryModel();
			$productCategory = $productCategoryModel->findAll(null, 'WHERE product_id = ' . $_POST['product_id']);

			foreach($productCategory as $category){
				$productCategoryModel->delete($category);
			}


			/* Delete from table product */

			$productModel = new ProductModel();
			$product = $productModel->findOne(array('product_id' => $_POST['product_id']));

			if(!empty($product->getImage())){
				unlink(BASE_PUBLIC . $product->getImage());
			}

			$productModel->delete($product);
			

			unset($_POST);
		}	
	}


	public function getProduct(){

		if(!empty($_POST)){

			$product = (new ProductModel)->findOne(array('product_id' => $_POST['product_id']));
			$stock   = (new StockModel)->findOne(array('product_id' => $_POST['product_id']));
			$productCategory = (new ProductCategoryModel)->findAll(null, 'WHERE product_id = ' . $_POST['product_id']);
			
			$categories = [];

			foreach($productCategory as $category){

				$categories[] = ($category->getCategory());
			}

			$result = array('product_id'     	  => $product->getId(),
							'product_tittle' 	  => $product->getTittle(),
							'stock_quantity'	  => $stock->getQuantity(),
							'product_description' => $product->getDescription(),
							'product_price' 	  => $product->getPrice(),
							'product_discount'    => $product->getDiscount(),
							'product_category'	  => $categories,
							'product_image'		  => $product->getImage());

			echo json_encode($result);
		}
	}


	public function getProducts($field = null){

		$result = (new ProductModel)->findAll($field);
		return $result;
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

	public function getSubCategories(Category $category){

		$categoryModel = new CategoryModel();
		$categories = $categoryModel->findAll(null, 'WHERE category_parent = ' . $category->getId());

		return $categories;
	}

	public function getStockQuantity(Product $product){

		$quantity = 0;

		if ($product){

			$stock = (new StockModel)->findOne(array('product_id' => $product->getId()));

			if($stock)
				$quantity = $stock->getQuantity();
		}

		return $quantity;
	}



	public function removeFile(){


	}


	public function saveFile(){

		$dir = BASE_PUBLIC . '/uploads/product/';

		if(!empty($_POST)){

			$product = (new ProductModel)->findOne(array('product_id' => $_POST['id']));

			if(!empty($product->getImage())){

				if(isset($_FILES['file'])){

					$img = BASE_PUBLIC . $product->getImage();
					unlink($img);
				}
			}	
		}

		if(!is_dir($dir)) {

			mkdir($dir, 0700);
		}

		if(isset($_FILES['file'])){

			$filePath = $dir . basename($_FILES['file']['name']);
			move_uploaded_file($_FILES['file']['tmp_name'], $filePath);
		}

	}
}