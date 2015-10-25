<?php

class uploadController 
{

        public function __construct(uploadView $uploadView, uploadModel $uploadModel)
        {
            
                $this->uploadView = $uploadView;
                $this->uploadModel = $uploadModel;
        }

        public function init()
        {
        
    if($this->uploadModel->rules($this->uploadView->getImg(),$this->uploadView->getImgName()))
    {
    $this->uploadModel->postImage($this->uploadView->getImg(),
                                $this->uploadView->getImgName());   
    }
    else
    {
        $this->uploadView->setMessage($this->uploadModel->getMessage());
    }

        }

}