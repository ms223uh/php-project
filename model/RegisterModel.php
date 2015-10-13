<?php


class RegisterModel
{
    
    private $message = "";


        public function newUser($UserName, $password, $repeatPassword)
        {
            $dal = new UserDAL();
            $result = true;
            
            if( strlen($UserName) < 3 ){
                $this->message .= "Username has too few characters, at least 3 characters.<br>";
                $result = false;
            }
            if( strlen($password) < 6)
            {
                $this->message .= "Password has too few characters, at least 6 characters.<br>";
                $result = false;
            }
            if($password != $repeatPassword)
            {
                $this->message .= "Passwords do not match.<br>";
                $result = false;
            }
            else if (strlen($UserName) > 0 && preg_match('/^[A-Za-z0-9]+$/',$UserName) == 0)
            {
                $this->message = "Username contains invalid characters.";
                return false;
            }
            else if($dal->getUser($UserName) != null)
            {
                $this->message = "User exists, pick another username.";
                return false;
            }
            
            return $result;
            
        }
        
        public function getMessage()
        {
            return $this->message;
        }
}