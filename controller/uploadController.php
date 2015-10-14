<?php

class uploadController {

        public function __construct(uploadView $uploadView, uploadModel $uploadModel){
            
                $this->uploadView = $uploadView;
                $this->uploadModel = $uploadModel;
                $this-init();

        }

        public function init(){
        
                if($this->uploadView->userWannaUpload()){
                
                        

                }

        }

}