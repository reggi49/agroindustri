<link href="<?php echo base_url().'css/style.css'?>" rel="stylesheet" type="text/css">
<h1>Create Account</h1>

<fieldset>
		<legend>Masukan data diri</legend>
		<?php
		echo form_open('login/create_member');
		echo form_input('npm',set_value('npm','npm'));
		echo form_input('nama',set_value('nama','nama'));
		echo form_input('email',set_value('email','email'));
		echo form_input('username',set_value('username','username'));
		echo form_input('password',set_value('password','password'));
		echo form_input('password2',set_value('password2','password confirmation'));

		echo form_submit('submit','create Acount');
		?>
		<?php echo validation_errors('<p class="error">');?>

</fieldset>