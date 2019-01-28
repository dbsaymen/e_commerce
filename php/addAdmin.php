<?php
/**
 * Created by PhpStorm.
 * User: developper
 * Date: 28/01/2019
 * Time: 21:10
 */


include 'connectSQL.php';

$first_name=$_POST["fname"];
$last_name=$_POST["lname"];
$email=$_POST["email"];
$PASSWORD=$_POST["password"];
$Mysql = new myDataBase();
$bdd= $Mysql->connect();
$sql = "INSERT INTO `admin`(`first_name`, `last_name`, `email`, `PASSWORD`) VALUES (\"$first_name\",\"$last_name\",\"$email\",\"$PASSWORD\")";
mysqli_query($bdd, $sql);
header("Location: ../admin/adminPanel");