<table class="uk-table">
	<thead>
			<tr>
				<th>Post Title</th>
				<th>Comment</th>
				<th>Author</th>
				<th>Action</th>
			</tr>
		</thead>	
		<tbody>
<?php while($comment = $comments->fetchObject()): ?>
			<tr>
				<td><span><?= $comment->post_title; ?></span></td>
				<td><span><?= $comment->comment_text; ?></span></td>
				<td><span><?= $comment->user_name; ?></span></td>
				<td><a href="/admin/delete/comment?comment-number=<?= $comment->comment_id; ?>">delete</a></td>
			</tr>
<?php endwhile ?>
	</tbody>
</table>