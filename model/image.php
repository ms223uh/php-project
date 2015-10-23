<?php

class image {
    
    private $title;
    private $filename;
    private $path;
    private $score = 0;
    
    public function __construct($title, $filename, $path){
        $this->title = $title;
        $this->filename = $filename;
        $this->path = $path;
    }
    
    
    public function __wakeup()
    {
        if (!isset($this->score))
        {
            $this->score = 0;
        }
        if (!isset($this->path))
        {
            $this->path = $this->filename;
        }
    }
    
    public function getTitle(){

        return $this->tile;
    }

    public function getFilename(){

        return $this->filename;
    }
    
    public function getPath(){

        return $this->path;
    }

    public function getScore(){

        return $this->score;
    }
    
    public function upvote(){
        $this->score ++;
    }

    public function downvote(){
        $this->score --;
    }

}