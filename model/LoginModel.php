<?php 
session_start();
class LoginModel {
    
    private $name;
    private $password;
    
    private $message;

    private $loggedIn;

    function checkLogin ($inputName, $inputPassword)
    {
        $this->name = "Admin";
        $this->password = "Password";
        
        
        $log = false;
        $this->loggedIn = $log;
        
        $dal = new UserDAL();

        /*
        
        if($this->name == $inputName && $this->password == $inputPassword)
        {
            $log = true;
            $this->loggedIn = $log;
 
        }
        */
        if($inputName == "")
        {
            
            $this->message = "Username is missing";
            return false;
            
        }
        
        else if($inputPassword == "")
        {
            
            $this->message = "Password is missing";
            return false;
            
        }
        
        $user = $dal->getUser($inputName);
        
        if($user != null && $user->getPassword() == $inputPassword)
        {
            $this->message = "Welcome";
            if(isset($_SESSION["user"])){
                $this->message = "";
            }
            $_SESSION["user"] = $user;
            return true;
        }
        
        else
        {
            $this->message = "Wrong name or password";
        }
        
        return false;

    } 
    
    
    
    
    public function responseModel(){
        
        return $this->message;
        
    }
    
    public function isLoggedin()
    {
        if(isset($_SESSION["user"]))
        {
            return $this->loggedIn = true;
        }
        else 
        {
            return $this->loggedIn = false;
        }
    }
    
    public function logout(){
        if(isset($_SESSION["user"])){
        $this->message = "Bye bye!";
        }
        
        unset($_SESSION["user"]);
        
    }
    
}