<?php
include 'fetchProducts.php';
include 'fetchViewData.php.php';
$baseUrl="http://localhost/shop/php/index.php?=";
$requestUrl = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$requestString = substr($requestUrl, strlen($baseUrl));
$urlParams = explode('/', $requestString);

if($urlParams[0]=="products"){
    getProducts();
}
if($urlParams[0]=="users"){
    getUsers();
}
if($urlParams[0]=="categoryNames"){
    getCategoryName();
}