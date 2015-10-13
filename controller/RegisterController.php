<?php

class RegisterController{
    
    private $regView;
    private $regModel;
    
    
    public function __construct(RegisterView $regView, RegisterModel $regModel,  UserDAL $registerDAL){
        
        $this->regView = $regView;
        $this->regModel = $regModel;
       
        $this->registerDAL = $registerDAL;
        $this->init();
    }
    
    public function init()
    {
        
        //var_dump($this->regView->getUserName());
        if($this->regView->userWannaRegister()){
                
                if ($this->regModel->newUser($this->regView->getUserName(), $this->regView->getPassword(), $this->regView->getrepeatPassword()))
                {
                    $_SESSION["newuser"] = $this->registerDAL->addUser($this->regView->getUserName(),$this->regView->getPassword());
                    header("location: ?login");
                }
        }
        
        
    }
    
    

    
    
    

}
