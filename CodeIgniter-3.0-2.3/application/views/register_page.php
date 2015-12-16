<h2> Welcome! Please Register With Us!</h2>
<div class="form">
	<?php
	
	echo form_open('register/create_user');
	echo form_input('username', set_value('username', 'Username'));
	echo form_input('first_name', set_value('first_name', 'First Name'));
	echo form_input('last_name', set_value('last_name', 'Last Name')) . "<br/>";
	echo form_input('phone', set_value('phone', 'phone'));
	echo form_input('street', set_value('street', 'Street'));
	echo form_input('city', set_value('city', 'City')) . "<br/>";
	echo form_input('state', set_value('state', 'State'));
	echo form_input('zip', set_value('zip', 'Zip'));
	echo form_input('email', set_value('email', 'Email Address')) . "<br/>";
	echo form_password('password', set_value('password', '', 'placeholder="Password" class="password"'));
	echo form_password('password_confirm', set_value('password', '', 'placeholder="Confirm Password" class="password_confirm"'));
	echo form_submit('submit', 'register');
	echo form_close();
	?>
	<?php echo validation_errors('<p class="error">');?>
</div>