<link href="<?php echo base_url().'css/style.css'?>" rel="stylesheet" type="text/css">
<body>
	<div id="login_form">
		<h1>Login Zone</h1>
			<?php 
			echo form_open('login/proses_login');
			echo form_input('username','Username');
			echo form_password('password','Password');
			echo form_submit('submit','Login');
			echo anchor('login/signup','Create Account');
			?>
	</div>
</body>