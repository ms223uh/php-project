<?php

class uploadModel {
    
    public function rules(){
        
            $uploadURL = "/uImages/";

        if(
            ($_FILES["files"]["type"] == "image/gif")
            ||($_FILES["files"]["type"] == "image/jpeg")
            ||($_FILES["files"]["type"] == "image/png")
          ){
                   
                        if($FILES["file"]["size"] < 100000){
                            return false;
                    }
  
                    else {
                            if(move_uploaded_file($_FILE["file"]["tmpFile"],
                                $uploadURL . $_FILES["file"]["name"])){
                                    return true;
                                }
                         }
                }
                
        
    }
    


    
}