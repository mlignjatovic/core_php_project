<div uk-grid>
<section class="uk-width-1-2">
	<div class="uk-padding-large">
	<?php if(isset($_GET['message']) && $_GET['message'] == 'error'): ?>
		<p class="uk-text-warning">Wrong username or password!</p>
	<?php endif ?>
		<form class="uk-form-stacked uk-form-width-medium uk-align-center" method="post" action="/check/login">
			<fieldset class="uk-fieldset uk-margin-small-bottom">
				<legend class="uk-legend">Login</legend>
				<label>Username:</label>
				<input class="uk-input" type="text" name="username" required>
				<label>Password:</label>
				<input class="uk-input" type="password" name="password">
			</fieldset>
			<input class="uk-button uk-button-secondary" type="submit" name="login" value="Login" required>
		</form>
	</div>
</section>
<section class="uk-width-1-2">
	<div class="uk-padding-large">
	<?php if(isset($_GET['set-user']) && $_GET['set-user'] == 'new-user'): ?>
		<p class="uk-text-success">Thank you for registration! Login to continue as new user.</p>
	<?php endif ?>	
	<?php if(isset($_GET['message']) && $_GET['message'] == 'user-exists'): ?>
		<p class="uk-text-warning">User already exists!</p>
	<?php elseif(isset($_GET['message']) && $_GET['message'] == 'invalid-email'): ?>
		<p class="uk-text-warning">Please enter valid email address!</p>	
	<?php elseif(isset($_GET['message']) && $_GET['message'] == 'invalid-username'): ?>
		<p class="uk-text-warning">Please use only alpha-numeric character for username!</p>
	<?php elseif(isset($_GET['message']) && $_GET['message'] == 'invalid-password'): ?>
		<p class="uk-text-warning">Password must have at least six characters!</p>			
	<?php endif ?>	
		<form class="uk-form-stacked uk-form-width-medium uk-align-center" method="post" action="/register">
			<fieldset class="uk-fieldset uk-margin-small-bottom">
				<legend class="uk-legend">Register</legend>
				<label>Username:</label>
				<input class="uk-input" type="text" name="user_name" required>
				<label>Email:</label>
				<input class="uk-input" type="email" name="user_email" required>
				<label>Password:</label>
				<input class="uk-input" type="password" name="user_password" required>
		<?php if(isset($_SESSION['administrator'])): ?>		
				<label>Select Role:</label>
				<select class="uk-select" name="role">
					<option value="administrator">Administrator</option>
					<option value="user">User</option>
				</select>
		<?php endif ?>		
			</fieldset>
			<input class="uk-button uk-button-secondary" type="submit" name="submit" value="Register">
		</form>
	</div>
</section>
</div>