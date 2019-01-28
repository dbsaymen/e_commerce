<?php
/**
 * Created by PhpStorm.
 * User: developper
 * Date: 19/01/2019
 * Time: 08:40
 */

include '../php/connectSQL.php';
session_start();

if(isset($_POST["uname"]) && isset($_POST["psw"])){
    $auth=authentification($_POST['uname'],$_POST['psw']);
    var_dump($auth);
    if($auth["auth"]){
        $_SESSION["info"]=$auth[0];
        header('Location: adminPanel/index.php');
    }else{
        session_unset();
        $_SESSION = array();
        session_destroy();
        header('Location: index.php?error=false#warning&a=2');
    }
}else{
    session_unset();
    session_destroy();
    header('Location: index.php?error=false#warning&b=3');
}


function authentification($email,$passwd){
    $verif=false;
    $Mysql = new myDataBase();
    $bdd= $Mysql->connect();
    $sql = "SELECT * FROM admin where email='$email' and PASSWORD='$passwd'";
    $resultat = mysqli_query($bdd, $sql);
    try{
        $donnee=mysqli_fetch_row($resultat);
        if(count($donnee)>0){
            $verif=true;
        }else
        {
            $verif=false;
        }
    }catch (Exception $e){
        $verif=false;
    }
    mysqli_close($bdd);
    $donnee=array($donnee,"auth"=>$verif);
    return($donnee);
}