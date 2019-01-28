<?php
/**
 * Created by PhpStorm.
 * User: developper
 * Date: 28/01/2019
 * Time: 20:40
 */
function getAdmins(){
    $response="
        <div class=\"modal fade\" id=\"scrollmodal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"scrollmodalLabel\" aria-hidden=\"true\">
 
                <div class=\"modal-dialog modal-lg\" role=\"document\">
                    <div class=\"modal-content\">
                    <form action=\"../../php/addAdmin.php\" method=\"post\" enctype=\"multipart/form-data\" class=\"form-horizontal\">
                        <div class=\"modal-header\">
                             <strong>Admins</strong> Manger
                            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                                <span aria-hidden=\"true\">&times;</span>
                            </button>
                        </div>
                        
                        <div class=\"modal-body\">
                            <div class=\"card-body card-block\">
                        <div class=\"row form-group\">
                            <div class=\"col col-md-3\"><label for=\"text-input\" class=\" form-control-label\">Admin First Name</label></div>
                            <div class=\"col-12 col-md-9\"><input type=\"text\" id=\"fName-input\" name=\"fname\" placeholder=\"First Name\" class=\"form-control\"><small class=\"form-text text-muted\">First Name</small></div>
                        </div>
                        <div class=\"row form-group\">
                            <div class=\"col col-md-3\"><label for=\"text-input\" class=\" form-control-label\">Admin Last Name</label></div>
                            <div class=\"col-12 col-md-9\"><input type=\"text\" id=\"lName-input\" name=\"lname\" placeholder=\"Last Name\" class=\"form-control\"><small class=\"form-text text-muted\">Last Name</small></div>
                        </div>
                        <div class=\"row form-group\">
                            <div class=\"col col-md-3\"><label for=\"text-input\" class=\" form-control-label\">Admin Email</label></div>
                            <div class=\"col-12 col-md-9\"><input type=\"email\" id=\"email-input\" name=\"email\" placeholder=\"Email\" class=\"form-control\"><small class=\"form-text text-muted\">Email</small></div>
                        </div>
                        <div class=\"row form-group\">
                            <div class=\"col col-md-3\"><label for=\"text-input\" class=\" form-control-label\">Password</label></div>
                            <div class=\"col-12 col-md-9\"><input type=\"password\" id=\"passwd-input\" name=\"password\" placeholder=\"password\" class=\"form-control\"><small class=\"form-text text-muted\">Password</small></div>
                        </div>
                        </div>
                        <div class=\"modal-footer\">
                            <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Cancel</button>
                            <button type=\"reset\" class=\"btn btn-danger btn-sm\">
                                <i class=\"fa fa-ban\"></i> Reset
                            </button>
                            <button type=\"submit\" class=\"btn btn-primary btn-sm\" >
                                <i class=\"fa fa-dot-circle-o\"></i> Submit
                            </button>
                        </div>
                        
                        </form>
                    </div>
                </div>
            </div>
            </div>
    ";
    $response=$response."<div class=\"row\">
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
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>";
    $Mysql = new myDataBase();
    $bdd= $Mysql->connect();
    $sql = "SELECT * FROM admin";
    $resultat = mysqli_query($bdd, $sql);

    $donnee=mysqli_fetch_all($resultat);
    foreach ($donnee as $user) {
        if($user[0]!="1"){
        $response=$response."<tr>
            <th>$user[1]</th>
            <th>$user[2]</th>
            <th>$user[3]</th>
            <th><button type=\"button\" class=\"btn btn-danger btn-sm\" onclick='deleteAdmin($user[0])'>Delete</button></th>
     </tr>";}
    }
    $response=$response."</tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        ";
    $response=$response."<button type=\"button\" class=\"btn btn-success pull-right\"  data-toggle=\"modal\" data-target=\"#scrollmodal\"><i class=\"fa fa-magic\"></i>&nbsp; New Admin</button>";
    $response=$response."</div><div class=\"clearfix\"></div>";
    echo $response;
}

function deleteAdmin($id){
    $Mysql = new myDataBase();
    $bdd= $Mysql->connect();
    $sql = "DELETE FROM `admin` WHERE id=".$id;
    mysqli_query($bdd, $sql);
}