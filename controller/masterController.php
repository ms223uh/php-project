<?php

require_once('controller/masterController.php');
require_once('controller/uploadController.php');
require_once('controller/viewController.php');

require_once('model/uploadModel.php');
require_once('model/image.php');
require_once('model/imageDAL.php');

require_once('view/imageView.php');
require_once('view/layoutView.php');
require_once('view/uploadView.php');

class masterController{
    
    
    public function __Construct(){
          
        $uri = $_SERVER["REQUEST_URI"];
        $uri = explode("?",$uri);
        
        $idal = new imageDAL();


        if (count($uri) > 1 && $uri[1] == "upload") {

            $uv = new uploadView($idal);
            $lv = new layoutView();
            $lv->render($uv);

         }

         else {

            $iv = new imageView($idal);
            $lv = new layoutView();
            $lv->render($iv);

         }
            $uv = new uploadView();

        if($uv->userWannaUpload()){

                $um = new uploadModel($idal);
                $uc = new uploadController($uv, $um); 

                $uc->init();

        }

    }
    
 
}