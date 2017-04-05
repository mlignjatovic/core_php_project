<?php
/*
*
* 	PublicView AND ALL THE CLASSES IN VIEWS FOLDER IS USED FOR GETING DATA FROM DATABASE
*/
class PublicView extends PostViewData{

	public function index () {
		//check if user want see just particular category posts, else view all posts
		if (isset($_GET['category']) && strlen($_GET['category'])) {
			$catName = htmlentities(trim($_GET['category']));
		}else {
			$catName = '%';
		}
		//call to Model method from PostViewData.php | view all posts
		$posts = $this->getPosts($catName);
		//call to Model method from PostViewData.php | make category menu
		$categories = $this->viewCategories();
		$data = 'Ui/index.php';
		//Template Class from core/ Template.php
	    Template::view('layout',['template'=>$data,'posts'=>$posts,'categories'=>$categories]);
	}

	public function onePostView () {

		if (!isset($_GET['post-number']) || empty($_GET['post-number']) || !is_numeric($_GET['post-number'])) {
			throw new Exception("Error Processing Request", 1);
			
		}else{
		$postId = htmlentities($_GET['post-number']);
		//call to Model method from PostViewData.php
		$post = $this->onePost($postId);
		//call to Model method from CommentsView.php
		$commentObj = new CommentsView();
		$comments = $commentObj->getComments($postId);
		
		$data = 'Ui/onePost.php';
		//Template Class from core/ Template.php
	    Template::view('layout',['template'=>$data,'post'=>$post,'comments'=>$comments]);
	}
	}

	public function loginView () {

		$data = 'Ui/login.php';
		//Template Class from core/ Template.php
	    Template::view('layout',['template'=>$data]);
	}
}