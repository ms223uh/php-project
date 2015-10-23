<?php

class uploadController {

        public function __construct(uploadView $uploadView, uploadModel $uploadModel){
            
                $this->uploadView = $uploadView;
                $this->uploadModel = $uploadModel;
            

        }

        public function init(){
        
                $this->uploadModel->rules($this->uploadView->getImg(),$this->uploadView->getImgName());

        }

}