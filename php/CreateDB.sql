CREATE TABLE provider(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    NAME VARCHAR(255),
    description VARCHAR(255),
    img_url VARCHAR(255)
); CREATE TABLE category(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    NAME VARCHAR(255),
    parent_id INT
); CREATE TABLE products(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    NAME VARCHAR(255),
    price FLOAT,
    rating FLOAT,
    stock INT,
    provider INT,
    description VARCHAR(255),
    img_url VARCHAR(255),
    size VARCHAR(3),
    color VARCHAR(15),
    details VARCHAR(255),
    category_id INT,
    active BOOLEAN DEFAULT TRUE,
    FOREIGN KEY(provider) REFERENCES provider(id),
    FOREIGN KEY(category_id) REFERENCES category(id)
); CREATE TABLE sales(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    product_id INT,
    discount_percent INT,
    FOREIGN KEY(product_id) REFERENCES products(id)
); CREATE TABLE review(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    TEXT VARCHAR(255),
    product_id INT,
    FOREIGN KEY(product_id) REFERENCES products(id)
); CREATE TABLE size(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    size_txt VARCHAR(255),
    stock INT,
    product_id INT,
    FOREIGN KEY(product_id) REFERENCES products(id)
);CREATE TABLE users(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    email VARCHAR(255),
    PASSWORD VARCHAR(255),
    wish_list VARCHAR(255),
    country VARCHAR(255),
    active BOOLEAN DEFAULT TRUE
);
CREATE TABLE adress(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Address1 VARCHAR(255),
    Address2 VARCHAR(255),
    Address3 VARCHAR(255),
    City VARCHAR(255),
    State VARCHAR(255),
    Country VARCHAR(255),
    PostalCode VARCHAR(255),
    user_id INT,
    primary_adrr BOOLEAN DEFAULT TRUE,
    FOREIGN KEY(user_id) REFERENCES users(id)
);  CREATE TABLE admin(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    email VARCHAR(255),
    PASSWORD VARCHAR(255)
); CREATE TABLE orders(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    creation_date DATE,
    current_status VARCHAR(255),
    comment VARCHAR(255),
    user_id INT,
    FOREIGN KEY(user_id) REFERENCES users(id)
); CREATE TABLE order_products(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    product_id INT,
    order_id INT,
    FOREIGN KEY(product_id) REFERENCES products(id),
    FOREIGN KEY(order_id) REFERENCES orders(id)
);




/*Clear tables:
DROP TABLE if exists
    order_products;
DROP TABLE if exists
    orders;
DROP TABLE if exists
    admin;
DROP TABLE if exists
    adress;
DROP TABLE if exists
    users;
DROP TABLE if exists
    size;
DROP TABLE if exists
    review;
DROP TABLE if exists
    sales;
DROP TABLE if exists
    products;
DROP TABLE if exists
    category;
DROP TABLE if exists
    provider;

Insert in Tables:

INSERT INTO `admin`(`first_name`, `last_name`, `email`, `PASSWORD`) VALUES ("admin","admin","admin","admin")
INSERT INTO `category`(`id`, `NAME`, `parent_id`) VALUES (1,"women",0);
INSERT INTO `category`(`id`, `NAME`, `parent_id`) VALUES (2,"men",0);
INSERT INTO `category`(`id`, `NAME`, `parent_id`) VALUES (3,"kids",0);
INSERT INTO `category`(`id`, `NAME`, `parent_id`) VALUES (4,"gadgets",1);
INSERT INTO `category`(`id`, `NAME`, `parent_id`) VALUES (5,"glasses",4);
INSERT INTO `category`(`id`, `NAME`, `parent_id`) VALUES (6,"watch",5);
INSERT INTO `category`(`id`, `NAME`, `parent_id`) VALUES (7,"shoes",2);
 */

/*ALTER TABLE
    products ADD CONSTRAINT category_fgKey FOREIGN KEY(category_id) REFERENCES category(id)*/