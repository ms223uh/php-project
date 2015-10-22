<?php

class uploadView {

                private static $uploadFile = 'uploadView::uploadFile';
                private static $imageID = 'uploadView::imageID';



            public function generateUploadForm() {
            		return '
            			<a href="?">Go Back</a> 
                    <form enctype="multipart/form-data"  method="POST" action="?upload" >
                        Select image to upload:
                        <input type="file" name="' . self::$imageID . '">
                        <input type="submit" value="Upload Image" name="' . self::$uploadFile . '">
                    </form>
                    
            		';
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
}