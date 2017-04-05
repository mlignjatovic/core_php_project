<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Mladen's News</title>
		<link rel="stylesheet" href="/assets/uikit/css/uikit.min.css" />
		<script src="/assets/uikit/js/jquery.min.js"></script>
        <script src="/assets/uikit/js/uikit.min.js"></script>
	</head>
		<body>
		<header>
			<nav class="uk-navbar-container uk-navbar">
				<ul class="uk-navbar-nav">
					<li><a href="/">Home</a></li>
				<?php if(isset($_SESSION['administrator'])): ?>
					<li><a href="/admin">New Post</a></li>
					<li><a href="/admin/posts">Post List</a></li>
					<li><a href="/admin/comments">Comments List</a></li>
				<?php endif ?>
				</ul>
				<div class=" uk-navbar-right">	
					<ul class="uk-navbar-nav">
					<?php if(isset($_SESSION['logged_in'])): ?>
						<?= !isset($_SESSION['administrator']) ? "<li><a href='/user/comments'>My Comments</a></li>" : ''; ?>
						<li><a href="/logout">Logout</a></li>
					<?php endif ?>	
						<li><a href="/login">Register or Login</a></li>
					</ul>
				</div>	
				
			</nav>
		</header>
				<?php if(isset($_SESSION['username'])): ?>
					<p class="uk-text-center">
					You are loged in as:<span class="uk-text-primary"> <?= $_SESSION['username']; ?></span></p>
				<?php endif ?>	
			<main class="uk-container uk-container-center">
				<?php require $template; ?>
			</main>	
		</body>
</html>