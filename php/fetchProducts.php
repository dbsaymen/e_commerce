<?php




 function getProducts(){
     $response="<div class=\"modal fade col-lg-6\" id=\"addProductForm\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"scrollmodalLabel\" aria-hidden=\"true\">
    <div class=\"card modal-dialog modal-lg\">
    <form action=\"../../php/addProduct.php\" method=\"post\" enctype=\"multipart/form-data\" class=\"form-horizontal\">
        <div class=\"card-header\">
            <strong>Products</strong> Manger<span style='float: right' aria-hidden=\"true\"><a href='#'>Hide</a></span>
        </div>
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
                    <div class=\"col col-md-3\"><label for=\"text-input\" class=\" form-control-label\">Stock</label></div>
                    <div class=\"col-12 col-md-9\"><input type=\"text\" id=\"Name-input\" name=\"Stock\" placeholder=\"Name\" class=\"form-control\"><small class=\"form-text text-muted\"></small></div>
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
        <div class=\"card-footer\">
            <button type=\"submit\" class=\"btn btn-primary btn-sm\" >
                <i class=\"fa fa-dot-circle-o\"></i> Submit
            </button>
            <button type=\"reset\" class=\"btn btn-danger btn-sm\">
                <i class=\"fa fa-ban\"></i> Reset
            </button>
        </div>
        </form>
    </div>
</div>";
     $response=$response."<div class=\"row\"><div class=\"col-md-4\" data-toggle=\"modal\" data-target=\"#addProductForm\">
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
         $sales=count(mysqli_fetch_all($resultat1));
         $resultat1 = mysqli_query($bdd, $sql5);
         $review=mysqli_fetch_all($resultat1);

         if($prod[10]>0){
             $isActive="checked";
         }else{
             $isActive="";
         }



            $response=$response."<div class=\"col-md-4\">
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


            <ul class=\"list-group list-group-flush\">
                <li class=\"list-group-item\">
                    <a href=\"#\"> <i class=\"fa fa-dollar\"></i> Price <span class=\"badge badge-primary pull-right\">$prod[2] $</span></a>
                </li>
                <li class=\"list-group-item\">
                    <a href=\"#\"> <i class=\"fa fa-dollar\"></i> Provider <span class=\"badge badge-primary pull-right\">$provider[0]</span></a>
                </li>
                <li class=\"list-group-item\">
                    <a href=\"#\"> <i class=\"fa fa-dollar\"></i> category <span class=\"badge badge-primary pull-right\">$category[0]</span></a>
                </li>
                <li class=\"list-group-item\">
                    <a href=\"#\"> <i class=\"fa fa-dollar\"></i>size <span class=\"badge badge-primary pull-right\">0</span></a>
                </li>
                <li class=\"list-group-item\">
                    <a href=\"#\"> <i class=\"fa fa-dollar\"></i>Color <span class=\"badge badge-primary pull-right\">0</span></a>
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
                    <a href=\"#\"> <i class=\"fa fa-tasks\"></i> stock <span class=\"badge badge-danger pull-right\">$prod[4]</span></a>
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

?>