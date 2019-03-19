<?php
	include 'init.php';
	logged_in_redirect();
	if (empty($_POST)===false){
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		if (empty($username) ===true || (empty($password) === true)){
			$errors[] =  'you need to enter a username and a password';
		}else if (user_exists($username)===false){
			$errors[] = 'User do not exist!';
		}else if (user_active($username) ===false){
			$errors[] = "you have not activate your acount!";
		}else {
			
			if (strlen($password) > 32 ){
				$errors[] = "password too long";
			}
			$login=  login ($username, $password);
			if ($login === false){
				$errors[] = "username or password incorect";
			}
			else{
				$_SESSION['user_id'] = $login;
				header('Location: index.php');
				exit();
			}
		}
		
	}
	else{
		$errors[] = "no data recive";
	}
if (empty($errors)==false){
	?>
		<h2> We tried to log you in, but...</h2>
	<?php
		echo output_errors($errors);
	}
?>