<?php
/**
 * Created by PhpStorm.
 * User: developper
 * Date: 19/01/2019
 * Time: 23:24
 */

function arrangeCategory(){
    $data="<form><select class='categorys custom-select' onchange='selectedCategory(this.value)' style=\"
    display: inline-block;
    width: 82%;
\">";
    getCategory(0,$data,0);
    $data=$data."</select>";
    $data=$data."<button type=\"button\" class=\"btn btn-danger\" onclick='DeleteCategory()' style=\"
    display: inline-block;
    width: 18%;
\" onClick='DeleteCategory()'>Delete - </button></br></br>";
    $data=$data."<div class=\"alert alert-warning\" role=\"alert\">
  If sub category choose the main from list or cheak the box!
</div>";

    $data=$data."<input id=\"newCategoryName\" type=\"text\" class=\"form-control\" placeholder=\"Category Name\" aria-label=\"Category Name:\" aria-describedby=\"button-addon2\" style=\"
    display: inline-block;
    width: 80%;
\">
<button class=\"btn btn-outline-secondary\" type=\"button\" id=\"button-addon2\" style=\"
    display: inline-block;
    width: 18%;
\" onclick='AddCategory()'>Add +</button></br>";
    $data=$data."<input id=\"isParentCategory\" type=\"checkbox\" aria-label=\"Checkbox for following text input\"> <span>Main Category!</span>";
    $data=$data."</form>";
    echo $data;
}

function getCategory($id,&$data,$i){
    $Mysql = new myDataBase();
    $bdd= $Mysql->connect();
    $sql = "SELECT * FROM category where parent_id= $id";
    $resultat = mysqli_query($bdd, $sql);
    $categorys=mysqli_fetch_all($resultat);
    if(count($categorys)>0){
        foreach ($categorys as $cat){
            $data=$data."<option value='$cat[0]'>";
            $data=$data.str_repeat("---",$i);
            $data=$data.$cat[1];
            $data=$data."</option>";
            getCategory($cat[0],$data,$i+1);
        }
    }
}

function DeleteCategory($id){
    $Mysql = new myDataBase();
    $bdd= $Mysql->connect();
    $sql = "select * from category where parent_id=$id";
    $result=mysqli_query($bdd, $sql);
    $data=mysqli_fetch_all($result);
    if(count($data)==0){
        $sql = "select * from products where category_id=$id";
        $result=mysqli_query($bdd, $sql);
        $data=mysqli_fetch_all($result);
        if(count($data)==0){
            $sql = "DELETE FROM `category` WHERE `category`.`id` = $id";
            mysqli_query($bdd, $sql);
            echo("success");
        }else{
            echo("fail");
        }
    }else{
        echo("fail");
    }
}
function AddCategory($name,$parentID){
    $Mysql = new myDataBase();
    $bdd= $Mysql->connect();
    $sql = "INSERT INTO `category`(`NAME`, `parent_id`) VALUES (\"$name\",$parentID)";
    echo($sql);
    mysqli_query($bdd, $sql);
}
