<?php

require_once('view/uploadView.php');
require_once('view/layoutView.php');
require_once('view/imageView.php');

class masterController{
    
    
    public function __Construct(){

                    $uri = $_SERVER["REQUEST_URI"];
                    $uri = explode("?",$uri);



                if (count($uri) > 1 && $uri[1] == "upload") {
                    
                    $uv = new uploadView();
                    $lv = new layoutView();
                    $lv->render($uv);
                    
                 }
                 
                 else {
                     
                    $iv = new imageView();
                    $lv = new layoutView();
                    $lv->render($iv);
                     
                 }
        
    }
    
 
}