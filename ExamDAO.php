<?php
	require_once("config.php");

	class ExamDAO{
		public static function createUser($fname, $lname, $email, $pass){
			global $db;
			if (!$email) return false;
			if (!$pass) return false;
			$query = "INSERT INTO user(fname, lname, email, password) VALUES('{$fname}','{$lname}','{$email}','{$pass}')";
			$result = $db->query($query);
			if($result){
				return true;
			}
		}

		public static function checkEmail($email){
			global $db;
			if (!$email) return false;
			$query = "SELECT * FROM user WHERE email = '{$email}'";
			$result = $db->query($query);
			if($result->num_rows > 0){
				return true;
			}else{
				return false;
			}
		}

		public static function loginAuthenticator($email,$pass){
			global $db;
			if (!$email) return false;
			if (!$pass) return false;

			$query = "SELECT * FROM user WHERE email = '{$email}' AND password = '{$pass}' ";
			$result = $db->query($query);

			if($result->num_rows > 0){
				$record = $result->fetch_assoc();
				$result->free();
				$_SESSION = $record;
				return true;
			}else {
				return false;
			}

		}

				
	}
?>