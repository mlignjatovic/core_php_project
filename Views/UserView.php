<?php
/*
*
* 	UserView AND ALL THE CLASSES IN VIEWS FOLDER IS USED FOR GETING DATA FROM DATABASE
*   THIS CLASS IS FOR NON-ADMIN REGISTERED USERS
*/
class UserView extends CommentsView {
	//get comments from loggedin user
	public function userComments () {
		if (!isset($_SESSION['logged_in'])) {
			echo "You are not logged in!";
		}else {
			if (isset($_SESSION['username']) && isset($_SESSION['user-id'])) {
				$userId = $_SESSION['user-id'];
				$comments = $this->getUserComments($userId);
			}
		}
		
		$data = 'Ui/dashboard.php';
		//Template Class from core/ Template.php
	    Template::view('layout',['template'=>$data,'comments'=>$comments]);
	}
}