<?php


class PostCtrlData extends Database {
	
	protected function insertPost ($post_title,$post_text,$cat_name) {
		//get category ID | this class private method
		$category = $this->getCategory($cat_name);
		
		$sql = 'INSERT INTO entries (post_title,post_text,cat_id) VALUES (?,?,?)';
		$data = [$post_title,$post_text,$category->cat_id];
		//create stdStatemment object | call to Model method from core/Database.php
		$this->setStatement($sql,$data);
	}

	protected function deletePost ($postId) {

		$sql = "DELETE FROM entries WHERE post_id = ?";
		$data = [$postId];
		//create stdStatemment object | call to Model method from core/Database.php
		$this->setStatement($sql,$data);
	}

	private function getCategory ($cat_name) {

		$sql = "SELECT cat_id FROM categories WHERE cat_name = ?";
		$data = [$cat_name];
		//create stdStatemment object | call to Model method from core/Database.php
		$statement = $this->setStatement($sql,$data);

		return $statement->fetchObject();
	}

	protected function updatePost ($post_title,$post_text,$cat_name,$postId) {

		$category = $this->getCategory($cat_name);
		$sql = "UPDATE entries SET post_title = ?, post_text = ?, cat_id = ? WHERE post_id = ?";
		$data = [$post_title,$post_text,$category->cat_id,$postId];
		//create stdStatemment object | call to Model method from core/Database.php
		return $this->setStatement($sql,$data);
	}
	//because of foerign key, all comments related with particular post must be deleted first
	protected function deletePostComments ($postId) {

		$sql = "DELETE FROM comments WHERE post_id = ?";
		$data = [$postId];
		//create stdStatemment object | call to Model method from core/Database.php
		$this->setStatement($sql,$data);
	}
	
}