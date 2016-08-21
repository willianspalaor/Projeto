CREATE DATABASE db;

USE db;

CREATE TABLE user (

	user_id INT NOT NULL AUTO_INCREMENT,
    user_name VARCHAR(50) NOT NULL,
    user_email VARCHAR(50) NOT NULL,
    user_pass CHAR(128) NOT NULL,
    
    PRIMARY KEY user_id(user_id),
    UNIQUE(user_name),
    UNIQUE(user_email)
    
);

CREATE TABLE category (

	category_id INT NOT NULL AUTO_INCREMENT,
    category_tittle VARCHAR(50) NOT NULL,
	category_parent INT NULL,
    
    PRIMARY KEY category_id(category_id)
);

CREATE TABLE product (
	
	product_id INT NOT NULL AUTO_INCREMENT,
	product_tittle VARCHAR(30) NOT NULL,
	product_description VARCHAR(100) NULL,
	product_price DECIMAL(9,2) NOT NULL,
	product_discount DECIMAL(9,2) NULL DEFAULT '0.00',
	product_image VARCHAR(500) NULL,

	PRIMARY KEY product_id(product_id),
	UNIQUE(product_tittle)
);

CREATE TABLE product_category (
	
    product_category_id INT NOT NULL AUTO_INCREMENT,
    product_id INT NOT NULL,
    category_id INT NOT NULL,
    
    PRIMARY KEY product_category_id(product_category_id),
    FOREIGN KEY product_category_product(product_id) REFERENCES product(product_id),
    FOREIGN KEY product_category_category(category_id) REFERENCES category(category_id)
);

CREATE TABLE stock(

	stock_id INT NOT NULL AUTO_INCREMENT,
    stock_quantity INT NOT NULL,
	product_id INT NULL,
    
    PRIMARY KEY stock_id(stock_id),
    FOREIGN KEY stock_product_id(product_id) REFERENCES product(product_id)

);

INSERT INTO user(user_name, user_email, user_pass) VALUES('Administrador', 'administrador@gmail.com', 123);
