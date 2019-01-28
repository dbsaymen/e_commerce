<?php
/**
 * Created by PhpStorm.
 * User: developper
 * Date: 20/01/2019
 * Time: 22:47
 */

function getProviderPage(){

    $response="
    <div class=\"modal fade\" id=\"UpdateModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"UpdateModalLabel\" aria-hidden=\"true\">
                <div class=\"modal-dialog modal-lg\" role=\"document\">
                    <div class=\"modal-content\">
                    <form action=\"../../php/updateProviders.php\" method=\"post\" enctype=\"multipart/form-data\" class=\"form-horizontal\">
                        <div class=\"modal-header\">
                             <strong>Providers</strong> Manger
                            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                                <span aria-hidden=\"true\">&times;</span>
                            </button>
                        </div>
                        
                        <div class=\"modal-body\">
                            <div class=\"card-body card-block\">
                            <div class=\"row form-group\">
                    <div class=\"col col-md-3\"><label for=\"text-input\" class=\" form-control-label\">Provider Name</label></div>
                    <div class=\"col-12 col-md-9\"><input type=\"text\" id=\"update_Name-input\" name=\"Name\" placeholder=\"Name\" class=\"form-control\"><small class=\"form-text text-muted\">put the name of the company</small></div>
                </div>
                <div class=\"row form-group\">
                    <div class=\"col col-md-3\"><label for=\"textarea-input\" class=\" form-control-label\">Description:</label></div>
                    <div class=\"col-12 col-md-9\"><textarea name=\"textarea-input\" id=\"update_description-input\" rows=\"9\" placeholder=\"Description...\" class=\"form-control\"></textarea></div>
                </div>
                <div class=\"row form-group\">
                    <div class=\"col col-md-3\"><label for=\"file-input\" class=\" form-control-label\">Select Image</label></div>
                    <div class=\"col-12 col-md-9\"><input type=\"file\" id=\"img-input\" name=\"img-input\" class=\"form-control-file\"></div>
                </div>
                <input type='text' id='selected_provider_to_update' style='display: none' name='selected_provider_to_update'>
                       
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
    ";

    $response=$response."
    <div class=\"modal fade\" id=\"scrollmodal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"scrollmodalLabel\" aria-hidden=\"true\">
 
                <div class=\"modal-dialog modal-lg\" role=\"document\">
                    <div class=\"modal-content\">
                    <form action=\"../../php/addProvider.php\" method=\"post\" enctype=\"multipart/form-data\" class=\"form-horizontal\">
                        <div class=\"modal-header\">
                             <strong>Providers</strong> Manger
                            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                                <span aria-hidden=\"true\">&times;</span>
                            </button>
                        </div>
                        
                        <div class=\"modal-body\">
                            <div class=\"card-body card-block\">
                            <div class=\"row form-group\">
                    <div class=\"col col-md-3\"><label for=\"text-input\" class=\" form-control-label\">Provider Name</label></div>
                    <div class=\"col-12 col-md-9\"><input type=\"text\" id=\"Name-input\" name=\"text-input\" placeholder=\"Name\" class=\"form-control\"><small class=\"form-text text-muted\">put the name of the company</small></div>
                </div>
                <div class=\"row form-group\">
                    <div class=\"col col-md-3\"><label for=\"textarea-input\" class=\" form-control-label\">Description:</label></div>
                    <div class=\"col-12 col-md-9\"><textarea name=\"textarea-input\" id=\"description-input\" rows=\"9\" placeholder=\"Description...\" class=\"form-control\"></textarea></div>
                </div>
                <div class=\"row form-group\">
                    <div class=\"col col-md-3\"><label for=\"file-input\" class=\" form-control-label\">Select Image</label></div>
                    <div class=\"col-12 col-md-9\"><input type=\"file\" id=\"img-input\" name=\"img-input\" class=\"form-control-file\"></div>
                </div>
                       
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
    ";






    $response=$response."<div class=\"row\"><div class=\"col-md-4\" data-toggle=\"modal\" data-target=\"#UpdateModal\">
    <aside class=\"profile-nav alt\">
        <section class=\"card \">
            <div class=\"card-header user-header alt bg-dark\" style=\"background-image: url('images/addProd.png'); background-repeat: no-repeat;background-size: cover;\" >
                <div class=\"media\">
                    <a href=\"#\">
                        <img class=\"align-self-center rounded-circle mr-3\" style=\"width:85px; height:85px;\" alt=\"\" src=\"images/new.png\" >
                    </a>
                    
                </div>
            </div>


            <ul class=\"list-group list-group-flush\">
                <li class=\"list-group-item\">
                    <a href=\"#\"> <i class=\"fa fa-dollar\"></i> Price <span class=\"badge badge-primary pull-right\">0</span></a>
                </li>
                <li class=\"list-group-item\">
                    <a href=\"#\"> <i class=\"fa fa-tasks\"></i> stock <span class=\"badge badge-danger pull-right\">0</span></a>
                </li>
                
            </ul>
        </section>
    </aside>
</div>";
    $Mysql = new myDataBase();
    $bdd= $Mysql->connect();
    $sql = "SELECT * FROM provider";
    $resultat = mysqli_query($bdd, $sql);

    $donnee=mysqli_fetch_all($resultat);
    foreach ($donnee as $prod){

        $response=$response."<div class=\"col-md-4\">
<aside class=\"profile-nav alt\">
    <section class=\"card\">
        <div class=\"card-header user-header alt bg-dark\">
            <div class=\"media\">
                <a href=\"#\">
                    <img class=\"align-self-center rounded-circle mr-3\" style=\"width:85px; height:85px;\" alt=\"\" src=\"$prod[3]\">
                </a>
                <div class=\"media-body\">
                    <h2 class=\"text-light display-6\">$prod[1]</h2>
                    <p>Project Manager</p>
                </div>
            </div>
        </div>


        <ul class=\"list-group list-group-flush\">
            
            <li class=\"list-group-item\" data-toggle=\"modal\" data-target=\"#UpdateModal\" onclick='updateProvider($prod[0])'>
                <a href=\"#\"> <i class=\"fa fa-tasks\" ></i> Update </a>
            </li>
            <li class=\"list-group-item\" onclick='deleteProvider($prod[0])'>
                <a href=\"#\"> <i class=\"fa fa-tasks\"></i> Delete </a>
            </li >
        </ul>
    </section>
</aside>
</div>";
    }

    $response=$response."</div>";
    echo $response;
    mysqli_close($bdd);
}
function arrangeProviderToSelect(){
    $data="<form><select class='providers custom-select' onchange='selectedProviderForProduct(this.value)' style=\"display: inline-block; width: 82%;\">";
    $Mysql = new myDataBase();
    $bdd= $Mysql->connect();
    $sql = "SELECT * FROM provider";
    $resultat = mysqli_query($bdd, $sql);
    $provider=mysqli_fetch_all($resultat);
    if(count($provider)>0){
        foreach ($provider as $prov) {
            $data = $data . "<option value='$prov[0]'>";
            $data=$data.$prov[1];
            $data=$data."</option>";
        }
    }
    $data=$data."</select>";
    echo $data;
}
function deleteProvider($id){
    $Mysql = new myDataBase();
    $bdd= $Mysql->connect();
    $sql = "DELETE FROM `provider` WHERE id=".$id;
    mysqli_query($bdd, $sql);
}
function getProviderByID($id){
    $Mysql = new myDataBase();
    $bdd= $Mysql->connect();
    $sql = "SELECT * FROM provider where id=".$id;
    $resultat = mysqli_query($bdd, $sql);
    $data=mysqli_fetch_row($resultat);
    header('Content-type: application/json');
    echo json_encode($data);
}