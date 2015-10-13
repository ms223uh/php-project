<?php

class uploadView {


            public function generateUploadForm() {
            		return '
            			
                    <form method="post" >
                        Select image to upload:
                        <input type="file" name="imageUpload" id="imageUpload">
                        <input type="submit" value="Upload Image" name="submit">
                    </form>
                    
            		';
            	}
            	
            	public function response(){
                    return $this->generateUploadForm();
                }
	
}