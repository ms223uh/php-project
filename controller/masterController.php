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
          
        $idal = new imageDAL();


        if (isset($_GET["upload"])) {

            $uv = new uploadView($idal);
            $lv = new layoutView();
            $lv->render($uv);

         }

         else {

            $iv = new imageView($idal);
            $lv = new layoutView();
             
            if($iv->getVote()){
                $image = $idal->getImageByFilename($iv->getVoteImage());
                if($image != null){
                    if($iv->getVoteType() == "up"){
                        $image->upvote();
                    }
                    else {
                        $image->downvote();
                    }
                    
                    $idal->save();
                }
            }
             
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