<?php

class StockModel extends Model{

	public function __construct(){
		parent::__construct();
	}


	public function insert(Stock $stock){

		$sql = 'INSERT INTO stock(stock_quantity, product_id) 
				VALUES (:stock_quantity, :product_id)';

		$this->save($sql, $stock, 'getId');
	}


	public function update(Stock $stock){

		$sql = 'UPDATE stock SET stock_quantity = :stock_quantity

				WHERE stock_id   = :stock_id AND
					  product_id = :product_id';


		$params = array('stock_id'   => $stock->getId(),
						'product_id' => $stock->getProduct());
				
		parent::save($sql, $stock, 'getId', $params);
	}


	public function delete(Stock $stock){

		$sql = 'DELETE FROM stock
				WHERE product_id = :product_id';

				
		$params = array('product_id' => $stock->getProduct());

		parent::delete($sql, $params);
	}


	public function findOne($params){

		$where = '';

		foreach($params as $key => $value){

			$where .= (!empty($where) ? ' AND ' : '') . $key . ' = :' . $key;
		}

		$sql = 'SELECT * FROM stock WHERE ' . $where;

		$result = parent::findOne($sql, $params);

		if(!empty($result)){

  			$stock = new Stock($result);
	  		return $stock;
	  	}

	  	return false;
	}

}