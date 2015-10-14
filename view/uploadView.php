<?php

class uploadView {

                private static $uploadFile = 'uploadView::uploadFile';



            public function generateUploadForm() {
            		return '
            			<a href="/">Go Back</a> 
                    <form method="post" >
                        Select image to upload:
                        <input type="file" name="imageUpload" id="imageUpload">
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
                
	
}