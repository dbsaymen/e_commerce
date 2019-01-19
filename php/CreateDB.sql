CREATE TABLE provider(
    id INT PRIMARY KEY NOT NULL,
    NAME VARCHAR(255),
    description VARCHAR(255),
    img_url VARCHAR(255)
);

CREATE TABLE category(
    id INT PRIMARY KEY NOT NULL,
    NAME VARCHAR(255),
    parent_id INT,
    FOREIGN KEY(parent_id) REFERENCES category(id)
);

CREATE TABLE products(
    id INT PRIMARY KEY NOT NULL,
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
    foreign key (provider) references provider(id),
    foreign key (category_id) references category(id)
);

CREATE TABLE category(
    id INT PRIMARY KEY NOT NULL,
    NAME VARCHAR(255),
    parent_id INT,
    FOREIGN KEY(parent_id) REFERENCES category(id)
);

CREATE TABLE review(
    id INT PRIMARY KEY NOT NULL,
    TEXT VARCHAR(255),
    product_id INT,
    FOREIGN KEY(product_id) REFERENCES products(id)
);

CREATE TABLE size(
    id INT PRIMARY KEY NOT NULL,
    size_txt VARCHAR(255),
    stock INT,
    product_id INT,
    FOREIGN KEY(product_id) REFERENCES products(id)
);

CREATE TABLE users(
    id INT PRIMARY KEY NOT NULL,
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    email VARCHAR(255),
    PASSWORD VARCHAR(255),
    wish_list VARCHAR(255)
); CREATE TABLE admin(
    id INT PRIMARY KEY NOT NULL,
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    email VARCHAR(255),
    PASSWORD VARCHAR(255)
);

/*ALTER TABLE
    products ADD CONSTRAINT category_fgKey FOREIGN KEY(category_id) REFERENCES category(id)*/