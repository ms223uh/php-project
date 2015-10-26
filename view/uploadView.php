<?php

class uploadView {

                private static $uploadFile = 'uploadView::uploadFile';
                private static $imageID = 'uploadView::imageID';
                private static $imageName = 'uploadView::imageName';
                private $message;                

                   public function __construct(uploadModel $upModel){
                       $this->upModel = $upModel;
                       $message = "";
                       $this->message = $message;
                   }
                  

            public function generateUploadForm() {
                
            		return '
                            
       <div id="header"><h2>ImageKing</h2></div>
            <div id="navbar">
            <a href="?"><img src="imageStyle/back.png" width="25" height="25px"> Go Back</a> 
            </div>
            <div id="main">
            <div id="uploadMain">
                 <div class="errorMess"> <p id="message">'.$this->message.'</p> </div>
                    <form enctype="multipart/form-data"  method="POST" action="?upload" >
                        <br>
                       Title
                        <br>
                        <input  name="' . self::$imageName . '">
                        <br>
                        <br>

                        Select image to upload

                        <input class="button" type="file" name="' . self::$imageID . '">

                        <br>
                        <br>

                        <input   type="submit" value="Upload Image" name="' .                                                self::$uploadFile . '">

                    </form>
                    </div>
        </div>



            			

                   
            		';
            	}
            	
                public function setMessage($message)
                {
                    
                    $this->message = $message;
                }
    
            	public function response(){
                    return $this->generateUploadForm();
                }
                
                public function userWannaUpload(){


                if (isset($_POST[self::$uploadFile])) { 
                        return true;
                }
                return false; 
                }
    
                public function getImg(){
                
                    return $_FILES[self::$imageID];
            }
                
                public function getImgName(){
                
                    return $_POST[self::$imageName];
                }
}