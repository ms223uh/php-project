<?php

class User {
    
    
    private $UserName;
    private $Password;
    
    public function __construct($UserName, $Password){
        $this->UserName = $UserName;
        $this->Password = $Password;
        
    }
    
    public function getUserName(){
        
        return $this->UserName;
    }
    
    public function getPassword(){
        
        return $this->Password;
    }
    
    
}