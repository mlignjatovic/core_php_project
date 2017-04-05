<?php
/*
*
*	ADMIN AND USERS INTERACTION WITH COMMENTS TABLE
*/
class Comments extends CommentsCtrl{

	//prepare comment for database
	public function setComment () {
		
		if (!isset($_POST['comment-text']) || !strlen($_POST['comment-text'])) {
			throw new Exception("Invalid input");
		}else {

			$author = htmlentities(trim($_POST['comment-author']));
			$comment = htmlentities(trim($_POST['comment-text']));
			$post_id = htmlentities(trim($_POST['post-id']));
			//call to Model method from CommentsCtrl.php | insert comment in database
			$this->insertComment($author,$comment,$post_id);
		}
		header("Location: /single/post?post-number={$post_id}");
		exit;
	}

	//prepare comment for deletation
	public function setDeleteComment () {
		//get comment ID
		if (!isset($_GET['comment-number']) || !is_numeric($_GET['comment-number'])) {
			throw new Exception("Invalid Post ID");
		}else {
			$comment_id = htmlentities(trim($_GET['comment-number']));
			//call to Model method from CommentsCtrl.php | delete comment from database
			$this->deleteComment($comment_id);
		}
		if (isset($_SESSION['administrator'])) {
			header("Location: /admin/comments");
			exit;
		}

		header("Location: /user/comments");
		exit;
		
	}
}