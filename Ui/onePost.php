<article class="uk-margin-medium-top">
	<h3 class="uk-article-title"><?= $post->post_title; ?></h3>
	<p><?= $post->post_text; ?></p>
</article>
<div class="uk-margin-large-top uk-container" uk-grid>	
<div class="uk-align-left">
<?php if(isset($_SESSION['logged_in'])): ?>	
			<form class="uk-form-width-medium uk-form" method="post" action="/insert/comment">
					<fieldset class="uk-fieldset uk-margin-small-bottom">
					<legend class="uk-legend">Insert Comment</legend>
						<input type="hidden" name="post-id" value="<?= $post->post_id; ?>">
						<input type="hidden" name="comment-author"
						 value="<?= isset($_SESSION['user-id']) ? $_SESSION['user-id'] : '8'; ?>">
						<textarea class="uk-textarea" name="comment-text"></textarea>
					</fieldset>
				<input class="uk-button uk-button-primary" type="submit" name="submit-coment" value="Add Comment">
			</form>
<?php endif ?>			
		</div>
	<section class="uk-align-center">
		<?php while($comment = $comments->fetchObject()): ?>
			<div class="uk-text-left">
				<h5 class="uk-text-success uk-text-bold"><?= $comment->user_name; ?></h5>
				<p><?= $comment->comment_text; ?></p>
			</div>
		<?php endwhile ?>	
	</section>
</div>		