<?php

class uploadModel {

private $idal;

public function __construct(imageDAL $idal){
    $this->idal = $idal;
    
}    


    public function rules($img,$title){
                
            $uploadDir = 'uImages/';
            $uploadImage = md5(time()) .".". pathinfo($img['name'], 
            PATHINFO_EXTENSION);

        if(
            ($img["type"] == "image/gif")
            ||($img["type"] == "image/jpeg")
            ||($img["type"] == "image/png")
            
          ){
                   
            if($img["size"] > 5000000){
                echo "Det gick ej att ladda upp bilden!";
                return false;
                }
                else { 

                move_uploaded_file($img['tmp_name'],$uploadDir . $uploadImage );
                $image = new image($title, $uploadImage, $uploadDir . $uploadImage);


                $this->idal->insertImage($image);
                        echo "Din bild har laddats upp!";
                            header('Location: ?#'.$image->getFilename());
                           }
            }

     } 

}
    


    
