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
            <li><a href="signup.html">Sign Up</a></li>
            <li><a href="login.html">Log In</a></li>
          </ul>
        </div>

    </div>

<!------------------sign up form------------------------------>
  	<div class="container">

      <?php
      include 'dao.php';

        if (isset($_POST['signup'])) {
          
          $error = "";
          $dao = new Dao();
          $f_name = $_POST['first-name'];
          $l_name = $_POST['last-name'];
          $email = $_POST['email'];
          $password = $_POST['password'];
          $phone_no = $_POST['phone-number'];

          if (empty($email)) {
          
          $error = "Enter your email address";

          }
          if (empty($password)) {
            
            $error = "Enter your Password";
            
          }
          if (empty($f_name)) {
            
            $error = "Enter your first name";

          }
          if (empty($l_name)) {
            
            $error = "Enter your last name";
            
          }
          if (empty($phone_no)) {
            
            $error = "Enter your phone number";
            
          }

          if ($error != "") {

            echo '<div class="alert alert-danger"><p>'.$error.'</p></div>';

          }else{

            //signing up the user;

            $session_id = $dao->signup_user($f_name,$l_name,$email,$password,$phone_no);

            if ($session_id == "") {
              
              $error = $dao->get_error();

              echo '<div class="alert alert-danger"><p>'.$error.'</p></div>';

            }else{

              $_SESSION['id'] = $session_id;
              echo '<div class="alert alert-success"><p>Account Successfully created</p></div>';
              header("location: login.php");
            }

          }
          
        }

      ?>
  		
      <div class="signup_form">
        
        <div class="signup-top">

          <h2>Sign Up</h2>
          <h3>Fill out this form and
          <br>start driving your favorite car</h3>
        </div>

        <form method="post">

          <div class="form-group">
            <label for="f-name">Enter your First Name:</label>
           <input type="text" name="first-name" placeholder="Eg: Joe" class="input" required="required" id="f-name">
          </div>

          <div class="form-group">

            <label for="l-name">Enter your Last Name:</label>
              <input type="text" name="last-name" placeholder="Eg: Brown" class="input" required="required" id="l-name">
          </div>

          <div class="form-group">

            <label for="email">Enter your Email Address:</label>
              <input type="text" name="email" placeholder="Eg. example@example.com" class="input" required="required" id="email">
          </div>

          <div class="form-group">

            <label for="password">Enter your Password:</label>
              <input type="password" name="password" placeholder="Password" class="input" required="required" id="password">
          </div>

          <div class="form-group">
            
             <label for="phone-number">Enter your Phone Number:</label>
              <input type="text" name="phone-number" placeholder="eg. +2547 12 345678" class="input" required="required" id="phone-number">            
          </div>

          <div class="form-group">
            <label id="terms-label"><input type="checkbox" name="terms" required="required" id="terms">I accept the <a href="#">Terms of use</a> &amp 
              <a href="#">Privacy policy</a> </label>
          </div>

          <div class="form-group">
            <p class="text">Already have an account?  <a href="login.html">Log in</a> </p>
          </div>

          <div class="form-group">
              <input type="submit" name="signup" value="Sign Up" class="sign-up-btn">            
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