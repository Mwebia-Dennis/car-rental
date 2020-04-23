<?php
	session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
    <link rel="stylesheet" type="text/css" href="css/signup.css">
    
  </head>
  <style type="text/css">
    
    .container{
      width: 30% !important;
    }
  </style>
  <body>

  	<div class="top-nav" >

        <div class="logo">

            <a href="index.php"><h2>Car Rental</h2></a>

        </div>

        <div class="main-nav">
          
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">FAQ</a></li>
          </ul>
        </div>

        <div class="right-nav" id="right-nav">
          
          <ul>
            <li><a href="signup.php">Sign Up</a></li>
            <li><a href="login.html">Log In</a></li>
          </ul>
        </div>

    </div>

<!------------------sign in form------------------------------>

  	<div class="container">
  		
  		<?php

	require('dao.php');
	
	if ($_SERVER['REQUEST_METHOD'] == "POST") {



		
		if (isset($_POST['login'])) {

			$dao = new Dao();
			$email = $_POST['email'];
			$password = $_POST['password'];
			$error = "";

			if (empty($email)) {
          
      	$error = "Enter your email address";

    	}
      if (empty($password)) {
      
      	$error = "Enter your Password";
      
    	}

			if ($error != "") {

            	echo '<div class="alert alert-danger"><p>'.$error.'</p></div>';

      }else{

    		$session_id = $dao->authenticate($email,$password);

				if ($session_id == "") {

			    $error = $dao->get_error();
          echo '<div class="alert alert-danger"><p>'.$error.'</p></div>';

				}else{

				   $_SESSION['id'] = $session_id;
          echo '<div class="alert alert-success"><p>Successful Log in</p></div>';

          if (isset($_POST['keep_loggedin'])) {
            
            setcookie('id','$session_id',time() + 60 * 60* 24 *365);
          }

				   //check the page user is coming from so as to determine what page to open after successful login;

        	if (isset($_GET['location'])) {
        		header("location: ".$_GET['location'].".php");
        	}else{

        		header("location: index.php");
        	}
          
				}
      }
			
		}
	}

?>

      <div class="signup_form">
        
        <div class="signup-top">

          <h2>Sign In</h2>
          <h3>Login To Your CarRental Account</h3>
        </div>

        <form method="post">

          <div class="form-group">

            <label for="email">Enter your Email Address:</label>
              <input type="text" name="email" placeholder="Eg. example@example.com" class="input" required="required" id="email">
          </div>

          <div class="form-group">

            <label for="password">Enter your Password:</label>
              <input type="password" name="password" placeholder="Password" class="input" required="required" id="password">
          </div>

          <div class="form-group">
            <label id="terms-label"><input type="checkbox" name="keep_loggedin" id="terms">Keep me logged in</label>
          </div>

          <div class="form-group">
            <p class="text">Forgot Password  <a href="#">Click Here</a></p>
            <p class="text">Dont have an account?  <a href="signup.php">Create One</a> </p>
          </div>

          <div class="form-group">
              <input type="submit" name="login" value="Log In" class="sign-up-btn">            
          </div>

        </form>
      </div>
  	</div>







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


    
    <script type="text/javascript">
      

      

      

    </script>
  </body>
</html>