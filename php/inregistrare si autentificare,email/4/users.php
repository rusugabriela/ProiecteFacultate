<?php


	function update_user($update_data){
		global $session_user_id;
		$update = array();
		
		array_walk($update_data,'array_sanitize');
		
		foreach ($update_data as $field=>$data){
			$update[] = '`'.$field.'` = \''.$data.'\' ';
		}
		mysql_query("update `users` set ".implode(', ',$update). " where `user_id` = $session_user_id");
	}


	function activate($email,$email_code){
		$email = mysql_real_escape_string($email);
		$email_code = mysql_real_escape_string($email_code);
		
		if (mysql_result(mysql_query("select count(`user_id`) from `users` where `email`='$email' and `email_code` ='$email_code' and `active` = 0"),0)==1){
			mysql_query("update `users` set `active` = 1 where `email` = '$email'")	;
			return true;
		}else{
			return false;
		}
		
	}

	function register_user($register_data){
		array_walk($register_data,'array_sanitize');
		$register_data['password']= md5($register_data['password']);
	
		$fields = '`'.implode('`, `',array_keys($register_data)).'`';
		$data = '\''.implode('\', \'',$register_data).'\'';
		//echo "insert into `users` ($fields) values ($data)";
		
		mysql_query("insert into `users` ($fields) values ($data)");
		
		email($register_data['email'],'Activate your acount',"
			Hello ". $register_data['first_name']."\n\n,
			You need to activate your acount, you need to click link below:\n\n
			Link;\nhttp://localhost:81/4/activate.php?email=".$register_data['email']."&email_code=".$register_data['email_code']."\n\nThanks!","From: Myprofile.com");
	}


	function user_count(){
		
		return mysql_result(mysql_query("select count(`user_id`) from `users` where `active` = 1"),0);
	}

	function user_data($user_id,$username){
		$data = array();
		$user_id = (int)$user_id;
		$func_num_args = func_num_args();
		$func_get_args = func_get_args();
		if ($func_num_args>1){
			unset($func_get_args[0]);
			$fields = '`'.implode('`, `' ,$func_get_args).'`';
			$data = mysql_fetch_assoc(mysql_query("select $fields from `users` where `user_id` = $user_id"));
			return $data;
		}
		
	}


	function logged_in(){
		return (isset($_SESSION['user_id'])) ? true : false;
	}
	
	function user_exists($username){
		$username = sanitize($username);
		$query = mysql_query("Select count(`user_id`) from `users` where `username` = '$username'");
		return (mysql_result($query , 0) ) ? true : false;
	}
	
	function email_exists($email){
		$email = sanitize($email);
		$query = mysql_query("Select count(`user_id`) from `users` where `email` = '$email'");
		return (mysql_result($query , 0) ) ? true : false;
	}
	function user_active($username){
		$username = sanitize($username);
		$query = mysql_query("Select count(`user_id`) from `users` where `username` = '$username' and `active` = 1");
		return (mysql_result($query , 0)==1 ) ? true : false;
	}
	
	function user_id_from_username($username){
		$username = sanitize($username);
		return mysql_result(mysql_query("select `user_id` from `users` where `username` = '$username'"),0 ,'user_id');
	}
	
	function login($username, $password){
		$user_id = user_id_from_username($username);
		$username = sanitize($username);
		$password = md5($password);
		
		return (mysql_result(mysql_query("select count(`user_id`) from `users` where `username` = '$username' and `password` = '$password'"),0)==1) ? $user_id : false;
		
	}
?>