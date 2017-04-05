<?php

class CommentsCtrl extends Database {

	protected function insertComment ($comment_author,$comment_text,$post_id) {

		$sql = "INSERT INTO comments (comment_author, comment_text, post_id) VALUES (?,?,?)";
		$data = [$comment_author,$comment_text,$post_id];
		//create stdStatemment object | call to Model method from core/Database.php
		$this->setStatement($sql,$data);
	}

	protected function deleteComment ($comment_id) {

		$sql = "DELETE FROM comments WHERE comment_id = ?";
		$data = [$comment_id];
		//create stdStatemment object | call to Model method from core/Database.php
		$this->setStatement($sql,$data);
	}

	
}