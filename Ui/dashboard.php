<section>
	<table class="uk-table">
	<thead>
			<tr>
				<th>Comment</th>
				<th>Action</th>
			</tr>
		</thead>	
		<tbody>
<?php while($comment = $comments->fetchObject()): ?>
			<tr>
				<td><span><?= $comment->comment_text; ?></span></td>
				<td><a href="/admin/delete/comment?comment-number=<?= $comment->comment_id; ?>">delete</a></td>
			</tr>
<?php endwhile ?>
	</tbody>
</table>	
</section>