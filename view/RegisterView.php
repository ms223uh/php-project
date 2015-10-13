<?php


class RegisterView {
	
		private static $name = 'RegisterView::UserName';
		private static $password = 'RegisterView::Password';
		private static $repeatpassword = 'RegisterView::PasswordRepeat';
		private static $register = 'RegisterView::Register';
		private static $message = 'RegisterView::Message';
		private static $savedName = '';
		
	

		public function __construct(RegisterModel $regModel){
			$this->regModel = $regModel;
		}

		 
		public function response() {

			return $this->generateRegisterFormHTML();
		}
		
		public function generateRegisterFormHTML() {
		return '
			<a href="?login">Back to login</a>
			<form method="post"> 
				<fieldset>
					<legend>Register User</legend>
				<p id="'.self::$message.'">'.$this->regModel->getMessage().'</p>
			<br>				
			<br>		
					<label>Username :</label>
					<input type="text" id="' . self::$name . '" name="' . self::$name . '" value="'.self::$savedName.'" />
			<br>				
			<br>
					<label>Password :</label>
					<input type="password" id="' . self::$password . '" name="' . self::$password . '" value=""/>
			<br>				
			<br>
					<label>Repeat Password :</label>
					<input type="password" id="' . self::$repeatpassword . '" name="' . self::$repeatpassword . '" value=""/>
			<br>				
			<br>
					<input type="submit" name="' . self::$register . '" value="Register" />
			<br>
			<br>
					
				</fieldset>
			</form>
			
		';
	}
	
	
	public function userWannaRegister(){
		
		if (isset($_POST[self::$register])) { 
			
			self::$savedName = preg_replace("/<\w+>|<\/\w+>|[^A-Za-z0-9]/",'',$_POST[self::$name]);
			return true;
		}
		return false;
	}
	
	
	
	public function getUserName()
	{
		return $_POST[self::$name];
	}
	
	public function getPassword()
	{
		return $_POST[self::$password];
	}
	
	public function getrepeatPassword()
	{
		return $_POST[self::$repeatpassword];
	}
	

	
}