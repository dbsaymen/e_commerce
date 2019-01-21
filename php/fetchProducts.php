<?php




 function getProducts(){
     $response="<div class=\"row\"><div class=\"col-md-4\">
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
         if($prod[12]){
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
                        <p>Project Manager</p>
                    </div>
                </div>
            </div>


            <ul class=\"list-group list-group-flush\">
                <li class=\"list-group-item\">
                    <a href=\"#\"> <i class=\"fa fa-dollar\"></i> Price <span class=\"badge badge-primary pull-right\">$prod[2] $</span></a>
                </li>
                <li class=\"list-group-item\">
                    <a href=\"#\"> <i class=\"fa fa-tasks\"></i> stock <span class=\"badge badge-danger pull-right\">$prod[4]</span></a>
                </li>
            </ul>
        </section>
    </aside>
</div>";
         }
     }
     $response=$response."</div>";
    echo $response;
     mysqli_close($bdd);
 }


?>