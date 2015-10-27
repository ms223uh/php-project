<?php
class imageView {
    
    private $vote;
    private $voteimage;
    private $votedimages;
    
    public function generateImageList(){
        return  ' 
        <div id="header"><h2>ImageKing</h2></div>
            <div id="navbar">
            
            <a href="?upload"><img src="imageStyle/upload.png" style="width: 25px; height: 25px" alt ="Upload New Image"> Upload New Image</a> 
<div id="navbarSort">
            <a href="?sort=true"><img src="imageStyle/score.png" style="width: 15px; height: 15px" alt ="Sort by Score"> Sort by Score</a>
            <a href="?sort=false"><img src="imageStyle/age.png" style="width: 15px; height: 15px" alt ="Sort by Age"> Sort by Age</a>
</div>
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
    
    public function CompareScores($a,$b)
    {
        if ($a->getScore() == $b->getScore())
            return 0;
        return $a->getScore() < $b->getScore() ? -1 : 1;
    }
    
    public function renderImages(){
        $images =  $this->idal->getImages();
        $imagesForHTML = "";
        
        //phpinfo();
        
        if (isset($_GET["sort"]) && $_GET["sort"] == "true")
        {
            usort($images,array($this, "CompareScores"));
        }
        
        
        if (isset($this->votedimages))
        {
            $votescookie = $this->votedimages;
        }
        elseif (isset($_COOKIE["votes"]))
        {
            $votescookie = json_decode(stripslashes($_COOKIE["votes"]),true);
        }
        else
        {
            $votescookie = array();
        }
        
        for( $i = count($images) - 1; $i>=0; $i-- )
        {
            $image = $images[$i];
            $r = time() + rand(0,99999999);
            $voted = isset($votescookie[$image->getFilename()]) ? "voted" : "";
           $imagesForHTML.= 
              "<div class='imageHolder' id='{$image->getFilename()}' >
              <div class='title'>{$image->getTitle()}</div>
              <img src='{$image->getPath()}' alt ='{$image->getTitle()}'/>
              <div class='imageHolderStuff'>
              <a href='?vote=up&image={$image->getFilename()}&r=$r#{$image->getFilename()}'>
              <img class='$voted' src='imageStyle/happy.png' alt ='upvote'></a>              
              <span class='score'>{$image->getScore()}</span>
              <a href='?vote=down&image={$image->getFilename()}&r=$r#{$image->getFilename()}'>
              <img class='$voted' src=".'imageStyle/unhappy.png'." alt ='downvote'></a>          
              <a href='{$image->getPath()}' target='_blank'><img src=".'imageStyle/eye.png'." alt ='open in new tab'></a>
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
                $votescookie = json_decode(stripslashes($_COOKIE["votes"]),true);
            }
            else
            {
                $votescookie = array("dummy"=>true);
            }
            $this->vote = $_GET["vote"];
            $this->voteimage = $_GET["image"];
            if (isset($votescookie))
            {
                if (isset($votescookie[$this->voteimage]))
                {
                    setcookie("votes",json_encode($votescookie),time()+60*60*24*365);
                    $this->votedimages = $votescookie;
                    return false;
                }
                $votescookie[$this->voteimage] = true;
            }
            setcookie("votes",json_encode($votescookie),time()+60*60*24*365);
            $this->votedimages = $votescookie;
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