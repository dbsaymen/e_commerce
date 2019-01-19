<?php
/**
 * Created by PhpStorm.
 * User: Desktop
 * Date: 05/12/2018
 * Time: 11:59
 */
class myDataBase{
    private $host = "localhost";
    private $db_name = "ecommerce";
    private $username = "root";
    private $password = "";


    public function connect(){

        if($bdd = mysqli_connect($this->host, $this->username, $this->password,$this->db_name))
        {
            echo "";
        }
        else
        {
            echo "connexion impossible";
        }
        return $bdd;
    }
}
