<?php

include_once BASE_PATH . '/configs/Connection.php';

class Model {

	private $conn;
    private $entity;
    private $method;
    private $params;
    private $sql;
    private $id;

	public function __construct(){
 		$this->conn = Connection::getInstance();
	}


    public function getLastId(){
        return $this->id;
    }


    public function save($sql, $entity, $method, $params = null){

        $this->sql    = $sql;
        $this->entity = $entity;
        $this->method = $method;
        $this->params = $params;

        if(empty($entity->$method())){

            self::insert();

        }else{

            self::update();
        }
    }


 	public function insert() {

        $this->conn->beginTransaction();

        try {

            $stmt = $this->conn->prepare($this->sql);

 			foreach($this->entity->toArray() as $key => $value){

                $stmt->bindValue(':' . $key, empty($value) ? null : $value);  
                
 			}

 			$stmt->execute();
            $this->id = $this->conn->lastInsertId();
            $this->conn->commit();
        }

        catch(Exception $e) {
            print($e->getCode());
            $this->conn->rollback();
        }
    }


    public function update() {
        
        $this->conn->beginTransaction();

        try {

            $stmt = $this->conn->prepare($this->sql);

            foreach($this->entity->toArray() as $key => $value){
                $stmt->bindValue(':' . $key, empty($value) ? null : $value);              
            } 

            foreach($this->params as $key => $value){
                $stmt->bindValue(':' . $key, $value);
            }

            $stmt->execute();
            $this->conn->commit();
        }

        catch(Exception $e) {
            print($e->getCode());
            $this->conn->rollback();
        }
    }


    public function delete($sql, $params) {

        $this->sql    = $sql;
        $this->params = $params;

        $this->conn->beginTransaction();

        try {

            $stmt = $this->conn->prepare($this->sql);

            foreach($this->params as $key => $value){
                $stmt->bindValue(':' . $key, $value);
            }

            $stmt->execute();
            $this->conn->commit();
        }
        catch(Exception $e) {
            print($e->getCode());
            $this->conn->rollback();
        }
    }


    public function findOne($sql, $params) {

        $this->sql    = $sql;
        $this->params = $params;
        
        try {

            $stmt = $this->conn->prepare($this->sql);

            foreach($this->params as $key => $value){
                $stmt->bindValue(':' . $key, $value);
            }

            $stmt->execute();
            return $stmt->fetch();
        }
        catch(Exception $e) {
            print($e->getMessage());
        }
    }


    public function findAll($sql) {

        $this->sql = $sql;
        
        try {

            $stmt = $this->conn->prepare($this->sql);
            $stmt->execute();

            return $stmt->fetchAll();
        }
        catch(Exception $e) {
            print($e->getMessage());
        }
    }

}