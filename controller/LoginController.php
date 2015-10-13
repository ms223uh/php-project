<?php

class LoginController {
    
    
    private $view;
    private $model;
    
    
    
    
    public function __construct(LoginView $view, LoginModel $model){
        
        $this->view = $view;
        $this->model = $model;
        $this->checkLogin();
    }
    
    public function checkLogin (){
        
        if($this->view->isPosted()) {
        
            $this->model->checkLogin($this->view->getUserName(), $this->view->getPassword());
      
        }
        else
        {
            $this->view->isNewUser();
            
            if($this->view->logout()){
                $this->model->logout();
                
            }
        }
        
        
    }
    
    
   
   
    
    
    
}
      
    
    
    
    
    
    
    
    
