<?php
/**
 * Created by PhpStorm.
 * User: developper
 * Date: 28/01/2019
 * Time: 21:29
 */
include 'connectSQL.php';
session_start();

$id=$_SESSION["info"][0];
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$email=$_POST["email"];
$passwd=$_POST["password"];

if($fname!=""){
    $Fname="`first_name`='$fname'";
}else{
    $Fname="`first_name`='".$_SESSION['info'][1]."'";
}
if($lname!=""){
    $Lname="`last_name`='$lname'";
}else{
    $Lname="`last_name`='".$_SESSION['info'][2]."'";
}
if($email!=""){
    $Email="`email`='$email'";
}else{
    $Email="`email`='".$_SESSION['info'][3]."'";
}
if($passwd!=""){
    $Passwd="`PASSWORD`='$passwd'";
}else{
    $Passwd="`PASSWORD`='".$_SESSION['info'][4]."'";
}

$sql="UPDATE `admin` SET $Fname,$Lname,$Email,$Passwd WHERE `id`=$id;";
$Mysql = new myDataBase();
$bdd= $Mysql->connect();
mysqli_query($bdd, $sql);

header("Location: ../admin/");