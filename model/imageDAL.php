<?php

class imageDAL {
    private static $FILE = "uImages/register.bin";
    private $images = array();
    
    public function __construct(){
        
        if (file_exists(self::$FILE))
        {
            $this->images = unserialize(file_get_contents(self::$FILE));
            if(!$this->images)
            {
                $this->images = array();
            }
        }
        
            

    }
    
    public function getImages(){
        return $this->images;
    }

    public function insertImage($image){
        array_push($this->images, $image);
        $this->save();
    }
    
    public function save(){
        file_put_contents(self::$FILE, serialize($this->images));
    }
}