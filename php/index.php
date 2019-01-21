<?php
include 'connectSQL.php';
include 'fetchProducts.php';
include 'fetchViewData.php';
include 'fetchCategory.php';
include 'fetchProviders.php';

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
    arrangeCategory();
}
if($urlParams[0]=="DeletCategory"){
    if(isset($urlParams[1])){
        DeleteCategory((int)$urlParams[1]);
    }
}
if($urlParams[0]=="AddCategory"){
    if(isset($urlParams[1]) and isset($urlParams[2])){
        AddCategory(urldecode($urlParams[1]),(int)$urlParams[2]);
    }
}
if($urlParams[0]=="AddProvider"){


}
if($urlParams[0]=="ProviderPage"){
    getProviderPage();

}

