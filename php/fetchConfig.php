<?php
/**
 * Created by PhpStorm.
 * User: developper
 * Date: 28/01/2019
 * Time: 21:20
 */
function fetchConfig(){
    $resp="
    <div class=\"content\">
        <div class=\"animated fadeIn\">
            <div class=\"row\">
                <div class=\"col-lg-6\">
                    <div class=\"card\">
                        <div class=\"card-header\">Example Form</div>
                        <div class=\"card-body card-block\">
                            <form action=\"../../php/updateAdmin.php\" method=\"post\" class=\"\">
                                <div class=\"form-group\">
                                    <div class=\"input-group\">
                                        <div class=\"input-group-addon\">First Name</div>
                                        <input type=\"text\" id=\"fname\" name=\"fname\" class=\"form-control\">
                                        <div class=\"input-group-addon\"><i class=\"fa fa-user\"></i></div>
                                    </div>
                                </div>
                                <div class=\"form-group\">
                                    <div class=\"input-group\">
                                        <div class=\"input-group-addon\">Last Name</div>
                                        <input type=\"text\" id=\"fname\" name=\"lname\" class=\"form-control\">
                                        <div class=\"input-group-addon\"><i class=\"fa fa-user\"></i></div>
                                    </div>
                                </div>
                                <div class=\"form-group\">
                                    <div class=\"input-group\">
                                        <div class=\"input-group-addon\">Email</div>
                                        <input type=\"email\" id=\"email3\" name=\"email\" class=\"form-control\">
                                        <div class=\"input-group-addon\"><i class=\"fa fa-envelope\"></i></div>
                                    </div>
                                </div>
                                <div class=\"form-group\">
                                    <div class=\"input-group\">
                                        <div class=\"input-group-addon\">Password</div>
                                        <input type=\"password\" id=\"password3\" name=\"password\" class=\"form-control\">
                                        <div class=\"input-group-addon\"><i class=\"fa fa-asterisk\"></i></div>
                                    </div>
                                </div>
                                <div class=\"form-actions form-group\">
                                    <button type=\"submit\" class=\"btn btn-primary btn-sm\">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    ";
    echo $resp;
}