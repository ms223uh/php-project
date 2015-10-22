<?php

class uploadModel {

private $idal;

public function __construct(imageDAL $idal){
    $this->idal = $idal;
    
}    


    public function rules($img){
                
            $uploadDir = 'uImages/';
            $uploadImage = $uploadDir . md5(time()) .".". pathinfo($img['name'], 
            PATHINFO_EXTENSION);

        if(
            ($img["type"] == "image/gif")
            ||($img["type"] == "image/jpeg")
            ||($img["type"] == "image/png")
            
          ){
                   
            if($img["size"] > 1000000){
                echo "Det gick ej att ladda upp bilden!";
                return false;
                }
                else { 

                move_uploaded_file($img['tmp_name'],$uploadImage );
                $image = new image("Titel som inte finns än", $uploadImage);


                $this->idal->insertImage($image);
                        echo "Din bild har laddats upp!";
                            
                           }
            }

     } 

}
    


    
