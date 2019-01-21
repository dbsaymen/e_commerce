<?php
/**
 * Created by PhpStorm.
 * User: developper
 * Date: 21/01/2019
 * Time: 00:32
 */
include 'connectSQL.php';
$target_dir = "uploads/";
$newName=generateRandomString();
$target_file = $target_dir . basename($_FILES["file-input"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$newName=$newName.".".$imageFileType;
$target_file=$target_dir.$newName;
// Check if image file is a actual image or fake image
$check = getimagesize($_FILES["file-input"]["tmp_name"]);
if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
} else {
    echo "File is not an image.";
    $uploadOk = 0;
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["file-input"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file-input"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["file-input"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
$target_file="../../php/".$target_file;
addProvider($_POST["text-input"],$_POST["textarea-input"],$target_file);
header("Location: ../admin/adminPanel");


function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function addProvider($name,$description,$imgUrl){
        $Mysql = new myDataBase();
        $bdd= $Mysql->connect();
        $sql = "INSERT INTO `provider`(`NAME`, `description`, `img_url`) VALUES (\"$name\",\"$description\",\"$imgUrl\")";
        echo($sql);
        mysqli_query($bdd, $sql);
}