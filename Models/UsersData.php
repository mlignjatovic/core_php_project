<?php


class UsersData extends Database {
	
	protected function registerUser ($username,$email,$password,$roleName = NULL) {
		//if role is set get role ID from this class private method
		$rolId = $this->getRolId($roleName);
		if (is_object($rolId)) {
			$userRole = $rolId->rol_id;
		}else {
			$userRole = NULL;
		}
		$sql = "INSERT INTO users (user_name,user_email,user_password,rol_id) VALUES (?,?,MD5(?),?)";
		$data = [$username,$email,$password,$userRole];
		//create stdStatemment object | call to Model method from core/Database.php	
		$this->setStatement($sql,$data);
	}
	//check if user exists for registration form
	protected function userExist ($username,$email) {
		$sql = "SELECT user_name, user_email FROM users
				WHERE user_name = ? AND user_email = ?";
		$data = [$username,$email];
		//create stdStatemment object | call to Model method from core/Database.php	
		$statement = $this->setStatement($sql,$data);
			if ( $statement->rowCount() < 1 ) {
				$out = true;
			} else {
				$out = false;
	}
		return $out;
	}
	//check credentails for login
	protected function checkCredentials ($username,$password) {
		$sql = "SELECT user_name,user_password FROM users
				WHERE user_name = ? AND user_password = MD5(?)";
		$data = [$username,$password];
		//create stdStatemment object | call to Model method from core/Database.php	
		$statement = $this->setStatement($sql,$data);
			if ( $statement->rowCount() > 0 ) {
				$out = true;
			} else {
				$out = false;
	}
		return $out;
	}

	protected function getRolName ($username) {

		$sql = "SELECT roles.rol_name FROM roles INNER JOIN users 
				ON users.rol_id = roles.rol_id WHERE users.user_name = ? ";
		$data = [$username];
		//create stdStatemment object | call to Model method from core/Database.php	
		$statement = $this->setStatement($sql,$data);
		
		return $statement->fetchObject();
	}

	private function getRolId ($rolName) {
		$sql = "SELECT rol_id FROM roles WHERE rol_name = ? ";
		$data = [$rolName];
		//create stdStatemment object | call to Model method from core/Database.php	
		$statement = $this->setStatement($sql,$data);

		return $statement->fetchObject();
	}
	
	protected function getUserId ($username) {

		$sql = "SELECT user_id FROM users WHERE user_name = ?";
		$data = [$username];
		//create stdStatemment object | call to Model method from core/Database.php	
		$statement = $this->setStatement($sql,$data);
		
		return $statement->fetchObject();
	}
	
}