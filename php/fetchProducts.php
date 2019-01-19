<?php

include 'connectSQL.php';


 function getProducts(){
     $Mysql = new myDataBase();
     $bdd= $Mysql->connect();
     $sql = "SELECT * FROM products";
     $resultat = mysqli_query($bdd, $sql);

     $donnee=mysqli_fetch_all($resultat);
     header('Content-Type: application/json');
     echo json_encode($donnee);
     mysqli_close($bdd);
 }

function getUsers(){
    $Mysql = new myDataBase();
    $bdd= $Mysql->connect();
    $sql = "SELECT * FROM users";
    $resultat = mysqli_query($bdd, $sql);

    $donnee=mysqli_fetch_all($resultat);
    header('Content-Type: application/json');
    echo json_encode($donnee);
    mysqli_close($bdd);
}

?>