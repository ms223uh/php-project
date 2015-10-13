<?php

require_once('view/LoginView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php');
require_once('view/RegisterView.php');

require_once('model/RegisterModel.php');
require_once('model/LoginModel.php');
require_once('model/User.php');
require_once('model/UserDAL.php');

require_once('controller/LoginController.php');
require_once('controller/RegisterController.php');


class MasterController{
    
    
    public function __construct(){
                
               
                
                    if (isset($_GET["register"]))
                    {
                        $rd = new UserDAL();
                        $rm = new RegisterModel($rd);
                        $lv = new LayoutView();
                        $dtv = new DateTimeView();
                        
                        
                        
                        $rv = new RegisterView($rm);
                        
                        $registerController = new RegisterController($rv,  $rm,   $rd);
                        
                        
                        $lv->render($rv,$dtv);
                       
                    }
                        else
                        {
                                $rd = new UserDAL();
                                $lm = new LoginModel($rd);
                                
                                $v = new LoginView($lm);
                                $dtv = new DateTimeView();
                                $lv = new LayoutView();
                                
                                $lc = new LoginController($v, $lm);
                                
                                $lv->render($v, $dtv);
                        }
                
                
                
        }
    

}

