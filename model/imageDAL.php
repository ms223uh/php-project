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
        $i = 0;
        foreach ($this->images as $image)
        {
            if (file_exists($image->getPath()))
            {
                $i++;
                continue;
            }
            
            array_splice($this->images,$i,1);
        }
        
        $this->save();
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
    
    public function getImageByFilename($filename)
    {
        foreach ($this->images as $image)
        {
            if ($image->getFilename() == $filename)
                return $image;
        }
        
        return null;
    }
}