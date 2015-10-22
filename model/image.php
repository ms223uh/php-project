<?php

class image {
    
    private $title;
    private $filename;
    private $score;
    
    public function __construct($title, $filename){
        $this->title = $title;
        $this->filename = $filename;
    }
    
    public function getTitle(){

        return $this->tile;
    }

    public function getFilename(){

        return $this->filename;
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