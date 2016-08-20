<?php

include_once BASE_PATH . 'models/Category.php';
include_once BASE_PATH . 'models/CategoryModel.php';
include_once BASE_PATH . 'models/Product.php';
include_once BASE_PATH . 'models/ProductModel.php';
include_once BASE_PATH . 'models/Stock.php';
include_once BASE_PATH . 'models/StockModel.php';
include_once BASE_PATH . 'models/ProductCategory.php';
include_once BASE_PATH . 'models/ProductCategoryModel.php';


class HomeController extends Controller {

	public function index(){

		session_start();
		$this->setLayout('layout-home');
		$this->setView('home/index');
		$this->loadPage();
	}


	public function basket(){

		session_start();
		$this->setLayout('layout-home');
		$this->setView('home/basket');
		$this->loadPage();
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

	public function getProducts($field = null){

    	$productCategoryModel = new productCategoryModel();
		$productModel = new ProductModel();

		$products = [];

		if((isset($_SESSION['category'])) && ($_SESSION['category'] != '')){

			$productCategory = $productCategoryModel->findAll($field, 'WHERE category_id = ' . $_SESSION['category']);

			foreach($productCategory as $pCategory){

				$products[] = $productModel->findOne(array('product_id' => $pCategory->getProduct()));
			}

		}else{

			$products = $productModel->findAll();

		}

		$_SESSION['category'] = '';
		return $products;
	}


	public function openProduct(){

		$product = (new ProductModel)->findOne(array('product_id' => $_POST['product_id']));
		$stock   = (new StockModel)->findOne(array('product_id' => $_POST['product_id']));


		if($this->hasDiscount($product)){

			$price = $this->getDiscount($product);

		}else{

			$price = $product->getPrice();
		}


		$result = array('product_id'     	  => $product->getId(),
						'product_tittle' 	  => $product->getTittle(),
						'product_description' => $product->getDescription(),
						'product_price' 	  => '$' . $price,
						'product_discount'    => $product->getDiscount(),
						'stock_quantity'	  => $stock->getQuantity(),
						'product_image'		  => "/public/" . $product->getImage());

		echo json_encode($result);

	}


	public function hasProduct($products){

		foreach($products as $product){

			if($product->getId() == $_POST['product_id']){

				return true;
				exit;
			}
		}

		return false;

	}


	public function addProduct(){

		session_start();

		$products = [];

		foreach($_SESSION['products'] as $product){

			$products[] = $product;
		}


		if(!$this->hasProduct($products)){

			$product = (new ProductModel)->findOne(array('product_id' => $_POST['product_id']));
			$products[] = $product;

			$basket = $_SESSION["basket"];

			$_SESSION["basket"] = $basket + 1;
			$_SESSION["products"] = $products;
		}
	
	}


	public function hasDiscount(Product $product){

		if(!empty($product->getDiscount())){

			return true;
		}

		return false;
	}


	public function getDiscount(Product $product){

		return ($product->getPrice() - $product->getDiscount());
	}


	public function hasSessionProducts(){

		if(isset($_SESSION['products']) && (count($_SESSION['products']) > 0)){

			return true;
		}

		return false;
	}


	public function getSessionProducts(){

		$products = [];

		foreach($_SESSION['products'] as $product) {

			$products[] = $product->getId();
		} 

    	if(count($products) > 1)
    		$products = implode(',', $products);

    	else if(count($products) == 1)
    		$products = $products[0];

    	else
    		$products = '';


    	return $products;
    }


	public function updateBasket(){

		$basket = $_SESSION["basket"];

		if($basket >= 1){
			$_SESSION["basket"] = $basket - 1;	
		}	
	}


    public function getBasketQuantity(){

    	$quantity = 0;

    	if(isset($_SESSION["basket"])){

    		$quantity = $_SESSION["basket"];
    	}

    	return $quantity;
    }

	public function removeProduct(){

		session_start();

		$products = [];

		foreach($_SESSION['products'] as $product){

			if($product->getId() != $_POST['product_id']){

				$products[] = $product;
			}
		}

		$_SESSION["products"] = $products;

		$this->updateBasket();
	}

    public function setCategory(){

    	session_start();
    	$_SESSION['category'] = $_POST['sub_category'];
    }

}