<?php

class imageView {
    
    
    public function generateImageList(){
        return  ' 
        <div id="header"><h2>ImageKing</h2></div>
            <div id="navbar">
            <a href="?upload"><img src="../imageStyle/upload.png" width="25" height="25px">Upload New Image</a> 
            </div>
            <div id="main">
        </div>
        
        ' 
        ;
        
    }
    
    public function response(){
        return $this->generateImageList();
    }
    
    
    
}