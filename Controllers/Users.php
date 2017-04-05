<?php

/**
* USER  REGISTRATION AND LOGIN/LOGOUT METHODS
*/
class Users extends UsersData {
	//prepare user data for database
	public function setRegisterUser() {
		
		if (!isset($_POST['user_name']) || !strlen($_POST['user_name'])
			 || !ctype_alnum($_POST['user_name'])) {
			header("Location: /login?message=invalid-username");
			exit;
		}elseif (!isset($_POST['user_email']) || !strlen($_POST['user_email'])
			 || !filter_var($_POST['user_email'],FILTER_VALIDATE_EMAIL)) {
			header("Location: /login?message=invalid-email");
			exit;
		}elseif (!isset($_POST['user_password']) || (strlen($_POST['user_password']) < 6 )) {
			header("Location: /login?message=invalid-password");
			exit;
		}else {

				$username = htmlentities(trim($_POST['user_name']));
				$email = htmlentities(trim($_POST['user_email']));
				$password = htmlentities(trim($_POST['user_password']));
				//if user is logged in as administrator he can create admin users
				if (isset($_POST['role'])) {
					$userRole = htmlentities(trim($_POST['role']));
				}
				//check if user exists | call to Model method from UsersData.php
			if ($this->userExist($username,$email)) {
				//call to Model method from UsersData.php
				$this->registerUser($username,$email,$password,$userRole);
			}else {
				header("Location: /login?message=user-exists");
				exit;
			}
			
		}

		header("Location: /login?set-user=new-user");
		exit;
	}

	public function loginUser () {
		session_unset();
		if (!isset($_POST['username']) || !strlen($_POST['username']) || 
			!isset($_POST['password']) || (strlen($_POST['password']) < 6)) {
			header("Location: /login?message=error");
			exit;
		}else {
			$username = htmlentities(trim($_POST['username']));
			$password = htmlentities(trim($_POST['password']));
			//check username and password | call to Model method form usersData.php
			if ($this->checkCredentials($username,$password)) {
				$_SESSION['logged_in'] = true;
				$userId = $this->getUserId($username);
				$_SESSION['user-id'] = $userId->user_id;
				$_SESSION['username'] = $username;
				//user can be without a rol so here we check if user have a role | call to Model method form  UserData.php
				if (is_object($this->getRolName($username))) {
					$role = $this->getRolName($username);
					//if a user have a role of administrator, admin session is set so we can do all admin stuff
					if ($role->rol_name == 'administrator') {
						$_SESSION['administrator'] = true;
						header("Location: /admin");
						exit;
					}
						
				}
				session_regenerate_id();
			}else {
				header("Location: /login?message=error");
				exit;
			}
		}
		header("Location: /");
		exit;

		
	}

	public function logout () {
		$_SESSION['logged_in'] = false;
		if (isset($_SESSION['administrator'])) {
			$_SESSION['administrator'] = false;
		}
		session_destroy();
		header("Location: /");
		exit;
	}
	
}