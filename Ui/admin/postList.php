<table class="uk-table">
	<thead>
			<tr>
				<th>Title</th>
				<th>Category</th>
				<th>Date</th>
				<th>Action</th>
				<th>Action</th>
			</tr>
		</thead>	
		<tbody>
<?php while ($post = $posts->fetchObject()):?> 
	<tr>
		<td><span><?= $post->post_title; ?></span></td>
		<td><span><?= $post->cat_name; ?></span></td>
		<td><span><?= $post->nice_date; ?></span></td>
		<td><a href="delete/post?post-number=<?= $post->post_id; ?>">delete</a></td>
		<td><a href="edit/post?post-number=<?= $post->post_id; ?>">edit</a></td>
	</tr>
<?php endwhile ?>
	</tbody>
</table>