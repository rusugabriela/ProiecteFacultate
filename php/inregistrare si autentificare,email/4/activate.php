<?php 
include 'init.php';
logged_in_redirect();
include 'includes header2.php';
if (isset($_GET['success'])== true && empty($_GET['success'])==true){
	echo 'Acount activated';
}
else if (isset($_GET['email'], $_GET['email_code'])===true){
		$email = trim($_GET['email']);
		$email_code = trim($_GET['email_code']);
		
		if (email_exists($email)===false){
			$error[] = "invalid email";	
		}
		else if(activate($email,$email_code) == false) {
			$errors[] ="we had problems activating your acount";
		}
		if (empty($errors)== false){
			?><h2> Somting gone wrong...</h2>
			<?php
			echo output_errors($errors);
		}else {
			header('Location: activate.php?success');
			
		}
	}			
	else{
		echo "not set";
	}
include 'footer2.php';?>	