<?php
include 'connectSQL.php';
include 'fetchProducts.php';
include 'fetchViewData.php';
include 'fetchCategory.php';
include 'fetchProviders.php';
//include 'updateProducts.php';

$baseUrl="http://localhost/shop/php/index.php?=";
$requestUrl = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$requestString = substr($requestUrl, strlen($baseUrl));
$urlParams = explode('/', $requestString);

if($urlParams[0]=="products"){
    if(isset($urlParams[1])){
        getProductByID((int)$urlParams[1]);
    }else{
        getProducts();
    }
}
if($urlParams[0]=="users"){
    getUsers();
}
if($urlParams[0]=="deleteProduct"){
    deleteProduct((int)$urlParams[1]);
}
if($urlParams[0]=="deleteProvider"){
    deleteProvider((int)$urlParams[1]);
}
if($urlParams[0]=="categoryNames"){
    arrangeCategory();
}
if($urlParams[0]=="categorySelect"){
    arrangeCategoryToSelect();
}
if($urlParams[0]=="providerSelect"){
    arrangeProviderToSelect();
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
if($urlParams[0]=="ProviderPage"){
    getProviderPage();
}
if($urlParams[0]=="updateActiveStatus"){
    updateActiveStatus((int)$urlParams[2],(int)$urlParams[1]);
}
if($urlParams[0]=="updatadeSalesStatus"){
    updatadeSalesStatus((int)$urlParams[2],(int)$urlParams[1],(int)$urlParams[3]);
}
if($urlParams[0]=="updateProduct"){

}
if($urlParams[0]=="deleteProduct"){
    if($urlParams[1]){
        deleteProductById((int)$urlParams[1]);
    }
}