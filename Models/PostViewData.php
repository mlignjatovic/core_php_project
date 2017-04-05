<?php


class PostViewData extends Database {
	//get all posts for public view
	protected function getPosts ($catName) {

		$sql = 'SELECT post_id, post_title,LEFT(post_text,300) AS post_text, 
						DATE_FORMAT(post_date, "%d/%m/%Y") AS nice_date, categories.cat_name FROM
						entries INNER JOIN categories ON entries.cat_id = categories.cat_id 
						WHERE categories.cat_name LIKE (?) ORDER BY post_date DESC';
		$data = [$catName];
		//create stdStatemment object | call to Model method from core/Database.php
		return $this->setStatement($sql,$data);				
	}
	//get all posts for admin manipulation
	protected function getPostList () {
		
		$sql = 'SELECT post_id, post_title, DATE_FORMAT(post_date, "%d/%m/%Y") AS nice_date, categories.cat_name FROM
						entries INNER JOIN categories ON entries.cat_id = categories.cat_id ORDER BY post_date DESC';
		//create stdStatemment object | call to Model method from core/Database.php				
		return $this->setStatement($sql);
	}


	protected function editPost ($postId) {

		$sql = "SELECT post_id, post_title, post_text FROM entries WHERE post_id = ?";
		$data = [$postId];
		//create stdStatemment object | call to Model method from core/Database.php
		$statement = $this->setStatement($sql,$data);

		return $statement->fetchObject();
	}
	//one post view
	protected function onePost ($postId) {

		$sql = 'SELECT post_id,post_title, post_text, DATE_FORMAT(post_date, "%d/%m/$Y") AS nice_date,
					   categories.cat_name FROM entries INNER JOIN categories ON entries.cat_id = categories.cat_id
					   WHERE post_id = ?';
		$data = [$postId];
		//create stdStatemment object | call to Model method from core/Database.php
		$statement = $this->setStatement($sql,$data);

		return $statement->fetchObject(); 			   
	}
	
	protected function viewCategories () {

		$sql = "SELECT cat_name FROM categories";
		//create stdStatemment object | call to Model method from core/Database.php
		return $this->setStatement($sql);
	}
}