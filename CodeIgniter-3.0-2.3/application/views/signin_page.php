


<div id="signin_form">
	<?php	
	echo "hello";
	if(isset($account_created)){
		echo "<h3>" . $account_created . "</h3>";
	}else{
		echo "<h1>Please Sign In</h1>";
	}
			?>
			
			<?php
			echo "Hello from the sign in page";
			echo form_open('signin/validate_credentials');
			echo form_input('username', 'Username');
			echo form_password('password', '', 'placeholder="Password" class="password"');
			echo form_submit('submit', 'Signin');
			echo form_close();	
			?>	
			
</div><!--Ends Signin_form div-->
