<?php


$router->get('','PublicView->index');
$router->get('login','PublicView->loginView');

$router->post('check/login','Users->loginUser');
$router->get('logout','Users->logout');

$router->get('admin','AdminView->newPost');
$router->get('admin/posts','AdminView->viewAllPosts');
$router->get('admin/comments','AdminView->viewAllComments');

$router->get('single/post','PublicView->onePostView');
$router->get('user/comments','UserView->userComments');

$router->post('insert/comment','Comments->setComment');
$router->get('admin/delete/comment','Comments->setDeleteComment');
$router->get('user/delete/comment','Comments->setDeleteComment');
$router->post('insert/post', 'Posts->setPost');

$router->get('admin/delete/post', 'Posts->setDeletePost');
$router->get('admin/edit/post', 'AdminView->viewEditPost');

$router->post('update/post', 'Posts->setUpdatePost');
$router->post('register','Users->setRegisterUser');