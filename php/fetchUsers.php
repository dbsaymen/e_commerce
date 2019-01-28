<?php
/**
 * Created by PhpStorm.
 * User: developper
 * Date: 28/01/2019
 * Time: 19:56
 */

function getUsers(){
    $response="<div class=\"row\">
                    <div class=\"col-md-12\">
                        <div class=\"card\">
                            <div class=\"card-header\">
                                <strong class=\"card-title\">Data Table</strong>
                            </div>
                            <div class=\"card-body\">
                                <table id=\"bootstrap-data-table\" class=\"table table-striped table-bordered\">
                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Country</th>
                                            <th>Status</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>";
    $Mysql = new myDataBase();
    $bdd= $Mysql->connect();
    $sql = "SELECT * FROM users";
    $resultat = mysqli_query($bdd, $sql);

    $donnee=mysqli_fetch_all($resultat);
    foreach ($donnee as $user) {
        if($user[6]>0){
            $isActive="checked";
        }else{
            $isActive="";
        }
        $response=$response."<tr>
            <th>$user[1]</th>
            <th>$user[2]</th>
            <th>$user[3]</th>
            <th>$user[5]</th>
            <th>
                <div class=\"material-switch pull-right\">
                    <input id=\"opt$user[0]\" type=\"checkbox\" $isActive/>
                    <label for=\"opt$user[0]\" class=\"label-success\" onclick='updatadeActiveStatusUser($user[0])'></label>
                </div>
            </th>
            <th><button type=\"button\" class=\"btn btn-danger btn-sm\" onclick='deleteUser($user[0])'>Delete</button></th>
     </tr>";
    }
    $response=$response."</tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div class=\"clearfix\"></div>";
    echo $response;
}
function updateActiveStatusUser($isActive,$id){
    $Mysql = new myDataBase();
    $bdd= $Mysql->connect();
    $sql="UPDATE `users` SET `active`=$isActive WHERE id=".$id;
    mysqli_query($bdd, $sql);
}
function deleteUser($id){
    $Mysql = new myDataBase();
    $bdd= $Mysql->connect();
    $sql = "DELETE FROM `users` WHERE id=".$id;
    mysqli_query($bdd, $sql);
}