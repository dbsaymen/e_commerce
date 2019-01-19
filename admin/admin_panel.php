<?php
/**
 * Created by PhpStorm.
 * User: developper
 * Date: 19/01/2019
 * Time: 09:35
 */
session_start();

if(isset($_SESSION['info'])){
    var_dump($_SESSION);
}else{
    header('Location : index.php');

}
