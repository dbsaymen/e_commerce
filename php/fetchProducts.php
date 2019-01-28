<?php

function getProducts(){
    $response=" <div class=\"modal fade\" id=\"updatemodal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"scrollmodalLabel\" aria-hidden=\"true\">
                <div class=\"modal-dialog modal-lg\" role=\"document\">
                    <div class=\"modal-content\">
                    <form action=\"../../php/updateProducts.php\" method=\"post\" enctype=\"multipart/form-data\" class=\"form-horizontal\">
                        <div class=\"modal-header\">
                             <strong>Update Products</strong> Manger
                            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                                <span aria-hidden=\"true\">&times;</span>
                            </button>
                        </div>
                        
                        <div class=\"modal-body\">
                            <div class=\"card-body card-block\">
                        <div class=\"row form-group\">
                            <div class=\"col col-md-3\"><label for=\"text-input\" class=\" form-control-label\">Product Name</label></div>
                            <div class=\"col-12 col-md-9\"><input type=\"text\" id=\"update_Name-input\" name=\"Name\" placeholder=\"Name\" class=\"form-control\"><small class=\"form-text text-muted\">put the name of the product</small></div>
                        </div>
                        <div class=\"row form-group\">
                            <div class=\"col col-md-3\"><label for=\"text-input\" class=\" form-control-label\">Price</label></div>
                            <div class=\"col-12 col-md-9\"><input type=\"text\" id=\"update_Price-input\" name=\"Price\" placeholder=\"price\" class=\"form-control\"><small class=\"form-text text-muted\"></small></div>
                        </div>
                        <div class=\"row form-group\">
                            <div class=\"col col-md-3\"><label for=\"text-input\" class=\" form-control-label\">Category</label></div>
                            <div id=\"choose_categoryUpdate\" class='col-lg-6'></div>
                            <input type=\"text\" id=\"Category-inputUpdate\" name=\"category\" placeholder=\"Provider\" class=\"form-control\" style='display: none'>
                        </div>
                        <div class=\"row form-group\">
                            <div class=\"col col-md-3\"><label for=\"text-input\" class=\" form-control-label\">Provider</label></div>
                            <div id=\"choose_providerUpdate\" class='col-lg-6'></div>
                            <input type=\"text\" id=\"Provider-inputUpdate\" name=\"provider\" placeholder=\"Provider\" class=\"form-control\" style='display: none'>
                        </div>
                        <div class=\"row form-group\">
                            <div class=\"col col-md-3\"><label for=\"textarea-input\" class=\" form-control-label\">Description:</label></div>
                            <div class=\"col-12 col-md-9\"><textarea name=\"textarea-input\" id=\"update_description-input\" rows=\"3\" placeholder=\"Description...\" class=\"form-control\"></textarea></div>
                        </div>
                        <div class=\"row form-group\">
                            <div class=\"col col-md-3\"><label for=\"textarea-input\" class=\" form-control-label\">Details:</label></div>
                            <div class=\"col-12 col-md-9\"><textarea name=\"Details-input\" id=\"update_Details-input\" rows=\"3\" placeholder=\"Details...\" class=\"form-control\"></textarea></div>
                        </div>
                        <div class=\"row form-group\">
                            <div class=\"col col-md-3\"><label for=\"file-input\" class=\" form-control-label\">Select Image</label></div>
                            <div class=\"col-12 col-md-9\"><input type=\"file\" id=\"file-input\" name=\"img-input\" class=\"form-control-file\"></div>
                        </div>
                        <input type='text'  id=\"selected_product_to_update\" name='selected_product_to_update' style='display: none'>
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
            </div>";
     $response=$response." <div class=\"modal fade\" id=\"scrollmodal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"scrollmodalLabel\" aria-hidden=\"true\">
 
                <div class=\"modal-dialog modal-lg\" role=\"document\">
                    <div class=\"modal-content\">
                    <form action=\"../../php/addProduct.php\" method=\"post\" enctype=\"multipart/form-data\" class=\"form-horizontal\">
                        <div class=\"modal-header\">
                             <strong>Products</strong> Manger
                            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                                <span aria-hidden=\"true\">&times;</span>
                            </button>
                        </div>
                        
                        <div class=\"modal-body\">
                            <div class=\"card-body card-block\">
                        <div class=\"row form-group\">
                            <div class=\"col col-md-3\"><label for=\"text-input\" class=\" form-control-label\">Product Name</label></div>
                            <div class=\"col-12 col-md-9\"><input type=\"text\" id=\"Name-input\" name=\"Name\" placeholder=\"Name\" class=\"form-control\"><small class=\"form-text text-muted\">put the name of the product</small></div>
                        </div>
                        <div class=\"row form-group\">
                            <div class=\"col col-md-3\"><label for=\"text-input\" class=\" form-control-label\">Price</label></div>
                            <div class=\"col-12 col-md-9\"><input type=\"text\" id=\"Name-input\" name=\"Price\" placeholder=\"Name\" class=\"form-control\"><small class=\"form-text text-muted\"></small></div>
                        </div>
                        <div class=\"row form-group\">
                            <div class=\"col col-md-3\"><label for=\"text-input\" class=\" form-control-label\">Category</label></div>
                            <div id=\"choose_category\" class='col-lg-6'></div>
                            <input type=\"text\" id=\"Category-input\" name=\"category\" placeholder=\"Provider\" class=\"form-control\" style='display: none'>
                        </div>
                        <div class=\"row form-group\">
                            <div class=\"col col-md-3\"><label for=\"text-input\" class=\" form-control-label\">Provider</label></div>
                            <div id=\"choose_provider\" class='col-lg-6'></div>
                            <input type=\"text\" id=\"Provider-input\" name=\"provider\" placeholder=\"Provider\" class=\"form-control\" style='display: none'>
                        </div>
                        <div class=\"row form-group\">
                            <div class=\"col col-md-3\"><label for=\"textarea-input\" class=\" form-control-label\">Description:</label></div>
                            <div class=\"col-12 col-md-9\"><textarea name=\"textarea-input\" id=\"description-input\" rows=\"3\" placeholder=\"Description...\" class=\"form-control\"></textarea></div>
                        </div>
                        <div class=\"row form-group\">
                            <div class=\"col col-md-3\"><label for=\"textarea-input\" class=\" form-control-label\">Details:</label></div>
                            <div class=\"col-12 col-md-9\"><textarea name=\"Details-input\" id=\"Details-input\" rows=\"3\" placeholder=\"Details...\" class=\"form-control\"></textarea></div>
                        </div>
                        <div class=\"row form-group\">
                            <div class=\"col col-md-3\"><label for=\"file-input\" class=\" form-control-label\">Select Image</label></div>
                            <div class=\"col-12 col-md-9\"><input type=\"file\" id=\"file-input\" name=\"img-input\" class=\"form-control-file\"></div>
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
            </div>";

     $response=$response."<div class=\"row\">
<div class=\"col-md-4\" data-toggle=\"modal\" data-target=\"#scrollmodal\">
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
     $sql = "SELECT * FROM products";
     $resultat = mysqli_query($bdd, $sql);

     $donnee=mysqli_fetch_all($resultat);
     foreach ($donnee as $prod){
         $sql1 = "SELECT NAME FROM provider WHERE id=".$prod[5];
         $sql2 = "SELECT NAME FROM category WHERE id=".$prod[9];
         $sql3 = "SELECT * FROM size WHERE product_id=".$prod[0];
         $sql4 = "SELECT * FROM sales WHERE product_id=".$prod[0];
         $sql5 = "SELECT * FROM review WHERE product_id=".$prod[0];
         $resultat1 = mysqli_query($bdd, $sql1);
         $provider=mysqli_fetch_row($resultat1);
         $resultat1 = mysqli_query($bdd, $sql2);
         $category=mysqli_fetch_row($resultat1);
         $resultat1 = mysqli_query($bdd, $sql3);
         $size=mysqli_fetch_all($resultat1);
         $resultat1 = mysqli_query($bdd, $sql4);
         $sales=mysqli_fetch_all($resultat1);
         $resultat1 = mysqli_query($bdd, $sql5);
         $review=mysqli_fetch_all($resultat1);

         // var_dump($sales);

         if($prod[10]>0){
             $isActive="checked";
         }else{
             $isActive="";
         }
         $discount=0;
         if(count($sales)>0){
             $inSales="checked";
             $discount=(float)$sales[0][2]*100;
         }else{
             $inSales="";
         }

         $sizes="";
         $colors="";
         foreach ($size as $s){
             $sizes=$sizes."<span class=\"badge badge-success pull-right\" style='margin-right: 5px; height: 22px;width: 22px;'>$s[1]</span>";
             $colors=$colors."<span class=\"badge badge-success pull-right\" style='background-color: $s[3];height: 22px;width: 22px; margin-right: 5px;'>-</span>";
         }
            $response=$response."
    <div class=\"col-md-4\">
        <aside class=\"profile-nav alt\">
        <section class=\"card\">
            <div class=\"card-header user-header alt bg-dark\">
                <div class=\"media\">
                    <a href=\"#\">
                        <img class=\"align-self-center rounded-circle mr-3\" style=\"width:85px; height:85px;\" alt=\"\" src=\"$prod[7]\">
                    </a>
                    <div class=\"media-body\">
                        <h2 class=\"text-light display-6\">$prod[1]</h2>
                        <p></p>
                    </div>
                </div>
            </div>


            <ul class=\"list-group list-group-flush\" id=\"$prod[1]\">
                <li class=\"list-group-item\" '>
                    <a href=\"#\"> <i class=\"fa fa-dollar\"></i> Price <span class=\"badge badge-primary pull-right\">$prod[2] $</span></a>
                </li>
                <li class=\"list-group-item\" >
                    <a href=\"#\"> <i class=\"fa fa-dollar\"></i> Provider <span class=\"badge badge-primary pull-right\">$provider[0]</span></a>
                </li>
                <li class=\"list-group-item\" >
                    <a href=\"#\"> <i class=\"fa fa-dollar\"></i> category <span class=\"badge badge-primary pull-right\">$category[0]</span></a>
                </li>
                <li class=\"list-group-item\">
                    <a href=\"#\"> <i class=\"fa fa-dollar\"></i>size $sizes</a>
                </li>
                <li class=\"list-group-item\">
                    <a href=\"#\"> <i class=\"fa fa-dollar\"></i>Color $colors</a>
                </li>
                <li class=\"list-group-item\">
                    <a href=\"#\"> <i class=\"fa fa-dollar\"></i>review <span class=\"badge badge-primary pull-right\">0</span></a>
                </li>
                <li class=\"list-group-item\">
                    <a href=\"#\"> <i class=\"fa fa-tasks\"></i> Active 
                    <div class=\"material-switch pull-right\">
                            <input id=\"opt$prod[0]\" type=\"checkbox\" $isActive />
                            <label for=\"opt$prod[0]\" class=\"label-success\" onclick='updatadeActiveStatus($prod[0])'></label>
                    </div>
                    </a>
                </li>
                <li class=\"list-group-item\">
                    <a href=\"#\"> <i class=\"fa fa-tasks\"></i> In Sales 
                    <div class=\"material-switch pull-right\">
                            <input id=\"sales$prod[0]\" type=\"checkbox\" $inSales />
                            <label for=\"sales$prod[0]\" class=\"label-success\" onclick='updatadeSalesStatus($prod[0])'></label>
                    </div>
                     <span class=\"badge badge-primary pull-right\"> $discount %</span>
                    </a>
                </li>
                
                <li class=\"list-group-item\">
                    <a href=\"#\"> <i class=\"fa fa-tasks\"></i> stock <span class=\"badge badge-danger pull-right\">$prod[4]</span></a>
                </li>
                <li class=\"list-group-item\">
                    <button type=\"button\" class=\"btn btn-danger btn-sm pull-left\" onclick='deleteProduct($prod[0])'>Delete</button>
                    <button type=\"button\" class=\"btn btn-success btn-sm pull-left\" onclick='ProductUpdate($prod[0])'  style=\"margin-left: 10px;\"  data-toggle=\"modal\" data-target=\"#updatemodal\">update</button>
                </li>
            </ul>
        </section>
    </aside>
</div>";

     }
     $response=$response."</div>";
    echo $response;
     mysqli_close($bdd);
 }
function updateActiveStatus($isActive,$id){
    $Mysql = new myDataBase();
    $bdd= $Mysql->connect();
    $sql="UPDATE `products` SET `active`=$isActive WHERE id=".$id;
    mysqli_query($bdd, $sql);
}
function updatadeSalesStatus($isActive,$id,$discount){

    $Mysql = new myDataBase();
    $bdd= $Mysql->connect();
    if($isActive){
        $discount=$discount/100;
        $sql="INSERT INTO `sales` (`id`, `product_id`, `discount_percent`) VALUES (NULL, '$id', '$discount')";
    }else{
        $sql="DELETE FROM `sales` WHERE product_id=$id ";
    }
    mysqli_query($bdd, $sql);
}
function getProductByID($id){
    $Mysql = new myDataBase();
    $bdd= $Mysql->connect();
    $sql = "SELECT * FROM products where id=".$id;
    $resultat = mysqli_query($bdd, $sql);
    $data=mysqli_fetch_row($resultat);
    header('Content-type: application/json');
    echo json_encode($data);
}
function deleteProduct($id){
    $Mysql = new myDataBase();
    $bdd= $Mysql->connect();
    $sql = "DELETE FROM `products` WHERE id=".$id;
    mysqli_query($bdd, $sql);
}


?>