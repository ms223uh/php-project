<?php

class imageView {
    
    
    public function generateImageList(){
        return  ' 
        <a href="?upload">Upload Image</a> 
        ' ;
        
    }
    
    public function response(){
        return $this->generateImageList();
    }
    
    
    
}