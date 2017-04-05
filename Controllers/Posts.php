<?php

/*
*
* THIS CLASS IS JUST FOR ADMIN INTERACTION WITH POSTS DATA
*/
class Posts extends PostCtrlData {
	
	//prepare post for database
	public function setPost () {

		if (!isset($_POST['title']) || !strlen($_POST['title'])) {
			header("Location: /admin?message=bad-title");
			exit;
			
		}elseif(!isset($_POST['text']) || !strlen($_POST['text'])){
			header("Location: /admin?message=bad-post");
			exit;
			
		}elseif (!isset($_POST['category']) || !strlen($_POST['category'])) {
			header("Location: /admin?message=bad-category");
			exit;
			
		}else {
			$title = $_POST['title'];
			$text = $_POST['text'];
			$category = $_POST['category'];
			//call to Model method from PostCtrlData.php | insert post in database
			$this->insertPost($title,$text,$category);
		}
		header("Location: /admin?message=success");
		exit;
	}

	
	//prepare post for deletation
	public function setDeletePost () {

		if(isset($_GET['post-number']) && !empty($_GET['post-number']) && is_numeric($_GET['post-number'])) {
			$postId = htmlentities($_GET['post-number']);
			//call to Model method from PostCtrlData.php || First delete all comments for this post
			$this->deletePostComments($postId);
			//call to Model method from PostCtrlData.php | delete post from database
			$this->deletePost($postId);
		}
		header("Location: /admin/posts ");
		exit;
	}

	
	//prepare post for editing
	public function setUpdatePost () {

		if (!isset($_POST['title']) || !strlen($_POST['title'])) {
			header("Location: /admin?message=bad-title");
			exit;
			
		}elseif(!isset($_POST['text']) || !strlen($_POST['text'])){
			header("Location: /admin?message=bad-post");
			exit;
			
		}elseif (!isset($_POST['category']) || !strlen($_POST['category'])) {
			header("Location: /admin?message=bad-category");
			exit;
			
		}elseif(!isset($_POST['post-id']) || empty($_POST['post-id']) || !is_numeric($_POST['post-id'])) {
			throw new Exception("Post ID required", 1);
		}else {	
			$title = $_POST['title'];
			$postId = $_POST['post-id'];
			$text = $_POST['text'];
			$category = $_POST['category'];
			//call to Model method from PostCtrlData.php
			$this->updatePost($title,$text,$category,$postId);
		}
		header("Location: /admin/posts ");
		exit;
	}


}