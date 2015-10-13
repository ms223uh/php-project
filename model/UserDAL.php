<?php

require_once('model/User.php'); 

class UserDAL
{
    private $users = array();
    private static $DB = "data/db.bin";
    private $serialized;
            
            public function __construct()
            {
                $this->users = $this->getUsers();
                
                $this->users = $this->users == null ? array() : $this->users;
            }

            public function addUser($UserName, $Password)
            {
                $user = new User($UserName, $Password);
                array_push($this->users, $user);
                
                
                $this->serialized = serialize($this->users);
                
                
                file_put_contents(self::$DB, $this->serialized);
                
                return $user;
            }
            
            
            public function getUsers()
            {
                $raw = file_get_contents(self::$DB);
                return unserialize($raw);
            }
            
            public function getUser($username)
            {
                if ($this->users != null)
                foreach ($this->users as $user)
                {
                    if (($username) == ($user->getUserName()))
                    {
                        return $user;
                    }
                }
                
                return null;
            }
    
    
}