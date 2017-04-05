<?php

class CommentsView extends Database{
	//get all comments for admin users 
	public function getAllComments() {

		$sql = "SELECT comment_id, comment_text, entries.post_title, users.user_name FROM comments
				INNER JOIN entries ON comments.post_id = entries.post_id 
				INNER JOIN users ON users.user_id = comments.comment_author";
		//create stdStatemment object | call to Model method from core/Database.php
		return $this->setStatement($sql);
	}
	//get comments for single post view
	public function getComments ($postId) {

		$sql = "SELECT comment_author, comment_text, users.user_name
				 FROM comments INNER JOIN users ON comments.comment_author = users.user_id WHERE post_id = ?";
		$data = [$postId];
		//create stdStatemment object | call to Model method from core/Database.php
		return $this->setStatement($sql,$data);		
	}
	//get comments for loggedin user
	public function getUserComments($userId) {

		$sql = "SELECT comment_id, comment_text FROM comments
				 WHERE comment_author = ?";
		$data = [$userId];
		//create stdStatemment object | call to Model method from core/Database.php
		return $this->setStatement($sql,$data);
	}

}