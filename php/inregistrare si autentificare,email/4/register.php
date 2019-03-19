<?php 
include 'init.php';
logged_in_redirect();
include 'header2.php';


if (empty($_POST)===false){
	$required_fields = array('username','password','password_again','first_name','email');
	//echo '<pre>', print_r($_POST,true),'</pre>';
	foreach($_POST as $key=>$value){
		if (empty($value)&& in_array($key,$required_fields)===true){
			$errors[] = 'Fields marked with asterix are required';
			break 1;
		}
	}
	
	if (empty($errors)===true){
		if (user_exists($_POST['username'])===true){
			$errors[] = "Sorry, the username exists!";
		}
		if (preg_match("/\\s/",$_POST['username'])==true){
			$errors[] = "Username must not contain any spaces!";
		}
		if (strlen($_POST['password'])<6){
			$errors[] = 'Your password must be at least 6 characters!';
		}
		if ($_POST['password'] != $_POST['password_again']){
			$errors[] = 'Password do not match!';
		}
		if (filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)===false){
			$errors[] = 'A valid email addres is required!';
		}
		//echo 'exista email alex?'.email_exists($_POST['email']); 
		if(email_exists($_POST['email'])==true){
			$errors[] ='Sorry, the email\''.$_POST['email'].'\' is already in use!';
		}
	}
}
?>
<h1>Register</h1>
	<?php
		if (isset($_GET['success']) && empty($_GET['success'])){
			echo 'You have been register succesfuly! please check your email to validate your account!';
		}
else{
		if (empty($_POST)===false && empty($errors)===true){
			$register_data = array(
			'username' =>$_POST['username'],
			'password' =>$_POST['password'],
			'first_name' =>$_POST['first_name'],
			'last_name' =>$_POST['last_name'],
			'email' =>$_POST['email'],
			'email_code' => md5($_POST['username'] + microtime())
			);
			register_user($register_data);
			header('Location: register.php?success');
			exit();
		}
		else if (empty($errors)===false){
			echo output_errors($errors);
		}
	
	?>
	<form action = "" method ="post">
		<ul>
			<li>Username*:<br>
				<input type="text" name = "username">
			</li>
			<li>
				Password*:<br>
				<input type ="password" name="password">
			</li>
			<li>
				Password again*:<br>
				<input type ="password" name="password_again">
			</li>
			<li>
				First name*:<br>
				<input type ="text" name="first_name">
			</li>
			<li>
				Last name:<br>
				<input type ="text" name="last_name">
			</li>
			<li>
				Email*:<br>
				<input type ="text" name="email">
			</li>
			<li>
				<input type = "submit" value = "Register">
			</li>
		</ul>
	</form>

<?php } include 'includes footer2.php';?>	