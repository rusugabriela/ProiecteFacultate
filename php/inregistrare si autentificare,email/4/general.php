<?php
	function email($to, $subject, $body){
		mail($to, $subject, $body, 'From: rusu_gabriela@yahoo.com');
		
	}
	
	
	function logged_in_redirect(){
		if (logged_in() == true){
			header('Location: index.php');
			exit();
			
		}
		
	}
	
	function array_sanitize(&$item){
		$item = mysql_real_escape_string($item);
		
	}

	function sanitize($data){
		
		return mysql_real_escape_string($data);
	}
	
	function output_errors($errors){
		$output = array();
		foreach($errors as $error){
			$output [] = '<li>' . $error. '</li>';
		}
		return '<ul>'.implode('',$output).'</ul>';
	}
?>