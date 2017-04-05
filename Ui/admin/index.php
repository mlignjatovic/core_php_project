<section>
<?php if(isset($_GET['message']) && $_GET['message'] == 'success' ): ?>
	<p class="uk-text-success">Post successful submited</p>
<?php elseif(isset($_GET['message']) && $_GET['message'] == 'bad-title'): ?>
	<p class="uk-text-warning ">Post title can't be empty</p>
<?php elseif(isset($_GET['message']) && $_GET['message'] == 'bad-post'): ?>
	<p class="uk-text-warning">Post text can't be empty</p>
<?php elseif(isset($_GET['message']) && $_GET['message'] == 'bad-category'): ?>
	<p class="uk-text-warning">Post must contain category</p>
<?php endif ?>
	<form class="uk-form uk-form-large uk-align-center" action="<?= isset($post) ? '/update/post' : 'insert/post'; ?>" method="post">
		<?php if(isset($post)):?>
			<input type="hidden" name="post-id" value="<?=$post->post_id;?>">
		<?php endif ?>	
		<label>Post Title</label>
		<input class="uk-input" type="text" name="title" value="<?= isset($post) ? $post->post_title : ''; ?>">
		<label>Post Text</label>
		<textarea class="uk-textarea" name="text"><?= isset($post) ? $post->post_text : ''; ?></textarea>
		<label>Select Category</label>
		<select class="uk-select" name="category">
			<option name="art">Art</option>
			<option name="design">Design</option>
			<option name="tech">Tech</option>
			<option name="motivation">Motivation</option>
		</select>
		<input class="uk-button uk-button-secondary" type="submit" name="submit" value="<?= isset($post) ? 'Update' : 'Submit'; ?>">
	</form>
</section>