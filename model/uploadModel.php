<?php

class uploadModel {

private $idal;
private $message;

public function __construct(imageDAL $idal){
    $this->idal = $idal;
    
}    


public function rules($img,$title){
    
   
    
    $this->message = "";    

    if(($img["type"] == "image/gif")
            ||($img["type"] == "image/jpeg")
            ||($img["type"] == "image/png")
      ){
                 
        if($img["size"] > 5000000){
           $this->message = "storlek fel";  
            
            return false;
        }
        
       if(strlen($title) < 5){
           
            $this->message = "titel fel";
           return false;

         }
       
            }
        else{
        $this->message = "fel format";
        return false;
    }

      
   return true;
} 
    
public function postImage($img,$title)
{
    $uploadImage = md5(time()) .".". pathinfo($img['name'], 
    PATHINFO_EXTENSION);
        
         $uploadDir = 'uImages/';
        move_uploaded_file($img['tmp_name'],$uploadDir . $uploadImage );
        $image = new image($title, $uploadImage, $uploadDir . $uploadImage);


        $this->idal->insertImage($image);
        echo "Success!";
       // header('Location: ?#'.$image->getFilename());
}

public function getMessage()
{
    return $this->message;
}

}
    


    
