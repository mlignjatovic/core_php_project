<section class="uk-margin-medium-top" uk-grid>
<section class="uk-width-2-3">
<?php while($post = $posts->fetchObject()): ?>
	<div>
	<article class="uk-article uk-card uk-card-default uk-card-body uk-width-1-2@m uk-align-center">
			<h2 class="uk-article-title"><?= $post->post_title; ?></h2>
			<p class="uk-article-meta">Writen on <?= $post->nice_date.', Category: '.$post->cat_name; ?> </p>
			<p><?= $post->post_text; ?></p>
			 <div class="uk-grid-small uk-child-width-auto" uk-grid>
		        <div>
		            <a class="uk-button uk-button-text" href="single/post?post-number=<?= $post->post_id ?>">Read more</a>
		        </div>
		    </div>
	</article>
		
	</div>	
<?php endwhile ?>	
</section>
<aside class="uk-width-1-3 uk-margin-medium-top">

	<nav>
		<ul class="uk-nav">
		<li><a href="/">Show All</a></li>
		<?php while($category = $categories->fetchObject()): ?>
			<li><a href="?category=<?=$category->cat_name; ?>"><?= ucfirst($category->cat_name); ?></a></li>
		<?php endwhile ?>		
		</ul>
	</nav>

</aside>
</section>