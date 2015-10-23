<?php

class imageView {
    
    private $vote;
    private $voteimage;
    
    public function generateImageList(){
        return  ' 
        <div id="header"><h2>ImageKing</h2></div>
            <div id="navbar">
            <a href="?upload"><img src="imageStyle/upload.png" width="25" height="25px">Upload New Image</a> 
            </div>
            <div id="main">

                '. self::renderImages() .'

        </div>
        
        ' 
        ;
        
    }
    
    public function response(){
        return $this->generateImageList();
    }

        
        public function __construct( $idal){
            $this->idal = $idal;
        }
    

    public function renderImages(){

        $images =  $this->idal->getImages();
        $imagesForHTML = "";
        for( $i = count($images) - 1; $i>=0; $i-- )
        {
            $image = $images[$i];
            $r = time() + rand(0,99999999);
           $imagesForHTML.= 
              "<div class='imageHolder' id='{$image->getFilename()}' >
              <div class='title'>{$image->getTitle()}</div>
              <img src='{$image->getPath()}'/>
              <div class='imageHolderStuff'>
              <a href='?vote=up&image={$image->getFilename()}&r=$r#{$image->getFilename()}'>
              <img src=".'imageStyle/happy.png'."></a>              
              <span class='score'>{$image->getScore()}</span>
              <a href='?vote=down&image={$image->getFilename()}&r=$r#{$image->getFilename()}'>
              <img src=".'imageStyle/unhappy.png'."></a>          
              <a href='{$image->getPath()}'><img src=".'imageStyle/eye.png'."></a>
          </div>
              </div>";
        }
        
        return $imagesForHTML;
       
    }
    
    public function getVote(){
        if(isset($_GET["vote"]))
        {
            if (isset($_COOKIE["votes"]))
            {
                $votescookie = unserialize($_COOKIE["votes"]);
            }
            else
            {
                $votescookie = array();
            }
            $this->vote = $_GET["vote"];
            $this->voteimage = $_GET["image"];
            if (isset($votescookie))
            {
                if (isset($votescookie[$this->voteimage]))
                {
                    setcookie("votes",serialize($votescookie));
                    return false;
                }
                $votescookie[$this->voteimage] = true;
            }
            setcookie("votes",serialize($votescookie));
            return true;
        }
        return false;
    }
    
    public function getVoteType(){
        return $this->vote;
    }

    public function getVoteImage(){
        return $this->voteimage;
    }
    
}