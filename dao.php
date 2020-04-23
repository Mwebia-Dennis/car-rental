
<?php
	
	include "connection.php";
?>
<?php

	
	/**
	 * class dao is a data 
	 */
	class Dao
	{
		public $error = "";
			
			function set_error($error){

				$this->error = $error;
			}
			function get_error(){

				return $this->error;
			}
			//function to be used while logging in the user;

			function authenticate($email,$password){

				global $conn;

				$error = "";

				$session_id="";
				$email = $conn->real_escape_string($email);
				$password = $conn->real_escape_string($password);

				$query = "SELECT * FROM customers WHERE email = '".$email."'";

				$result = $conn->query($query);

				if ($result->num_rows == 1) {
					
					$row = $result->fetch_assoc();
					$db_email = $row['email'];
					$db_password = $row['password'];
					$cust_id = $row['customer_id'];

					$salt = "thankyouforloggingintooursite".$cust_id;
					$salt_and_password = $salt.$password;

					if ($db_email == $email && password_verify($salt_and_password, $db_password)) {
						
						$session_id = $cust_id;
					}else{
						$error = "wrong user email and password";
					}
				}else{
					$error = "User does not exist, Try again later or sign up";
				}

				if ($error != "") {
					
					$this->set_error($error);
				}
				
				return $session_id;


			}

			function signup_user($f_name,$l_name,$email,$password,$phone_no){

				global $conn;
				$error = "";
				$session_id = "";
				$f_name = $conn->real_escape_string($f_name);
				$l_name = $conn->real_escape_string($l_name);
				$email = $conn->real_escape_string($email);
				$password = $conn->real_escape_string($password);
				$phone_no = $conn->real_escape_string($phone_no);

				//check if user already exists;

				$query = "SELECT * FROM customers WHERE email = '".$email."'";
				$result = $conn->query($query);

				if ($result->num_rows == 1) {
					
					$error = "User email already exists";
				}else{

					//sign up the user

					$query = "INSERT INTO customers (first_name,last_name,email,password,phone_number,active) VALUES('".$f_name."','".$l_name."', '".$email."', 
					'".$password."', '".$phone_no."', '0')";

					$result = $conn->query($query);

					if ($result) {
						
						//get password so as to hash it then get user id to set as session id;

						$query = "SELECT * FROM customers WHERE email = '".$email."'";
						$result = $conn->query($query);
						if($result){

							$row = $result ->fetch_assoc();
							$cust_id = $row['customer_id'];
							$password = $row['password'];
							$salt = "thankyouforloggingintooursite".$cust_id;
							$salt_and_password = $salt.$password;
							$hashed_password = password_hash($salt_and_password, PASSWORD_DEFAULT);

							//update user password with the hashed password;
							$query = "UPDATE customers SET password = '$hashed_password' WHERE customer_id = '$cust_id'";

							$conn->query($query);
							$session_id = $cust_id;
						}

					}else{
						$error = "Could not Sign you up, Try again later";
					}
				}

				if ($error != "") {
					
					$this->set_error($error);
				}

				return $session_id;
			}



			function sendMessage($email,$message){

				$error = "";
				global $conn;

				if (empty($email)) {
					$error .= "enter your email";
				}
				if (empty($message)) {
					$error .= "please enter your thoughts";
				}

				if ($error == "") {
					
					$query = "INSERT INTO messages (user_email,message) VALUES('".$conn->real_escape_string($email)."','".$conn->real_escape_string($message)."')";

					if ($conn->query($query)) {
						
						$error .= "message sent successfully.";
						$this ->set_error($error);
						return;
					}else{

						$error .= "could not send message...";
						$this ->set_error($error);
						return;
					}
				}else{

					$error = "Error: " . $error;

					$this ->set_error($error);
					return;
				}


			}
	}





?>