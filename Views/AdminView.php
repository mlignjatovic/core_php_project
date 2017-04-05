<?php
/*
*
* 	AdminView AND ALL THE CLASSES IN VIEWS FOLDER IS USED FOR GETING DATA FROM DATABASE
*/
class AdminView extends PostViewData{


	public function __construct () {
		parent::__construct();
		if (!isset($_SESSION['logged_in']) && !isset($_SESSION['administrator']) ) {
			header("Location: /");
			exit;
		}
	}
	
	public function newPost () {
		
		$data = 'Ui/admin/index.php';
		//Template Class from core/ Template.php
		Template::view('layout',['template'=>$data]);
	}

	public function viewAllPosts () {

		//call to Model method from PostViewData.php | view list of all posts
		$posts = $this->getPostList();
		$data = 'Ui/admin/postList.php';
		//Template Class from core/ Template.php
	    Template::view('layout',['template'=>$data,'posts'=>$posts]);
	}

	public function viewEditPost () {

		if (!isset($_GET['post-number']) || !is_numeric($_GET['post-number'])) {
			throw new Exception("Post ID required", 1);
			
		}else {
		$postId = htmlentities($_GET['post-number']);
		//call to Model method from PostViewData.php | editing post view
		$post = $this->editPost($postId);
		$data = 'Ui/admin/index.php';
		//Template Class from core/ Template.php
		Template::view('layout',['template'=>$data,'post'=>$post]);
	}
	}

	public function viewAllComments () {
		//object from CommentsView.php | get list of all comments
		$commentObj = new CommentsView();
		$comments = $commentObj->getAllComments();
		$data = 'Ui/admin/commentList.php';
		//Template Class from core/ Template.php
		Template::view('layout',['template'=>$data,'comments'=>$comments]);
	}


}