<aside>
	<?php 
		if (logged_in() === true){
			include 'loggedin.php';
		}else{
			include 'login.php';
		}
	?>
</aside>