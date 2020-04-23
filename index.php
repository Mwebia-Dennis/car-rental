<?php
session_start();
include 'dao.php'; 
$error = "";

  if (isset($_COOKIE['id'])) {
    $_SESSION['id'] = $_COOKIE['id'];
  }

  if (isset($_POST['logout'])) {
    
    //logout the user;
    unset($_SESSION['id']);
    setcookie('id', '', time() - 60 * 60);
  }


?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Car Hire</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-----css styles--------------------->


    <link rel="stylesheet" type="text/css" href="css/index.css">

  </head>
  <body>
<!---------------------------MENU--------------------->
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
          <?php

            if (isset($_SESSION['id'])) {
              echo '<form method="post">';
              echo '<button class="btn btn-danger btn-md-6" name="logout" >Logout</button>';
              echo '</form>';
            }else{

             echo "<ul>";
                echo '<li><a href="signup.php">Sign Up</a></li>';
                echo '<li><a href="login.php">Log In</a></li>';
              echo "</ul>";
            }
          ?>
        </div>

    </div>

<!-----------------Sliders--------------------------->
   <div class="slider">
         <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="images/background1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                 <h5 class="slider-text">Car Rentals</h5>
                  <p class="slider-info">Everything as simple as Search,Book And Drive.</p>
                </div>
              </div>

              <div class="carousel-item">
                <img src="images/background.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5 class="slider-text">Tuende Ocha</h5>
                  <p class="slider-info">This Easter book a luxurious family car na Tuende Ocha</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="images/background2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5 class="slider-text">Everyone is covered</h5>
                  <p class="slider-info">Are you a Mum? Is the kid making you not to drive?
                    <br>We got you covered</p>
                </div>
              </div>
            </div>
    </div>
  </div>

    <!---------------------------------form search car area----------------------------------->


    <div class="search-form">
      <form>

      <h2>Lets Find You A Car</h2>
      
      <div class="input-field">


          <select id="car-type">
            <option selected="selected" hidden="true" value="">Car Type</option>
            <option>Mercedes benz</option>
          <option>Toyota</option>
          <option>Subaru</option>
          <option>Honda</option>
          <option>BMW</option>
        </select>
          
      </div>

      <div class="input-field">
        

          <select id="car-price">
            <option selected="selected" hidden="true" value="">Car Price</option>
            <option>Kshs.1000 - Kshs.5000</option>
            <option>Kshs.6000 - Kshs.10000</option>
            <option>Kshs.10001 - Kshs.15000</option>
        </select>
          
      </div>

      <div>
        <br><input type="submit" name="submit_search" class="search" value="Search">
      </div>
    </form>
    </div>

<!--------------------------------------featured category --------------------------->

      <div class="new-categories">
        <hr>
        
        <h2 class="new">Featured</h2>

        <div class="container">
          <div class="row">
            <div class="col-md-3">
              
              <div class="product-top">

              <img src="images/v8.jpg">

                <div class="overlay-right">
                  
                  <button type="button" title="Quick View"><i class="fa fa-eye" aria-hidden="true"></i></button>
                  <button type="button" title="Book"><i class="fa fa-check" aria-hidden="true"></i></button>
                </div>
              </div>

              <div class="product-bottom text-centered">
                
                <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star-half-o" aria-hidden="true"></i>

              <h3>Toyota LandCruiser v8 2019</h3>
              <h5>Kshs. 8,000 per day</h5>
              </div>
            </div>

            <div class="col-md-3">
              
              <div class="product-top">

                <img src="images/e350.jpg">

                <div class="overlay-right">
                  
                  <button type="button" title="Quick View"><i class="fa fa-eye" aria-hidden="true"></i></button>
                  <button type="button" title="Book"><i class="fa fa-check" aria-hidden="true"></i></button>
                </div>
              </div>

              <div class="product-bottom text-centered">
                
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>

              <h3>Mercedes E350 2019</h3>
              <h5>Kshs. 10,000 per day</h5>
              </div>
            </div>

            <div class="col-md-3">
              
              <div class="product-top">

                <img src="images/vitz.jpg">

                <div class="overlay-right">
                  
                  <button type="button" title="Quick View"><i class="fa fa-eye" aria-hidden="true"></i></button>
                  <button type="button" title="Book"><i class="fa fa-check" aria-hidden="true"></i></button>
                </div>
              </div>

              <div class="product-bottom text-centered">
                
                <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star-half-o" aria-hidden="true"></i>
              <i class="fa fa-star-o" aria-hidden="true"></i>

              <h3>Toyota Vitz 2019</h3>
              <h5>Kshs. 5,000 per day</h5>
              </div>
            </div>

            <div class="col-md-3">
              
              <div class="product-top">

              <img src="images/doublecab.jpg">

                <div class="overlay-right">
                  
                  <button type="button" title="Quick View"><i class="fa fa-eye" aria-hidden="true"></i></button>
                  <button type="button" title="Book"><i class="fa fa-check" aria-hidden="true"></i></button>
                </div>
              </div>

              <div class="product-bottom text-centered">
                
                <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star-o" aria-hidden="true"></i>

              <h3>Hilux Double Cab 2019</h3>
              <h5>Kshs. 6,500 per day</h5>
              </div>
            </div>
          </div>
        </div>

      </div>
  
    
      </div>
      
    </div>


    <!------------------------------------------marketting content------------------------------------------>

    <div class="marketting-content">

      <div class="marketting-top-header">
        <h2>Why Choose Us</h2>
        <p>Explore Our Top Class Car Rental Services</p>
      </div>
      
      <div class="container">
        
        <div class="row">


          <div class="col-md-4">
            <div class="card bg-light" style="width: 100%;">
              <div class="marketting-icons">
                <i class="fa fa-car" aria-hidden="true"></i>
              </div>
              <div class="card-body">
                <h5 class="card-title">Variety Of Car Brands</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card bg-light" style="width: 100%;">
              <div class="marketting-icons">
                <i class="fa fa-usd" aria-hidden="true"></i>
              </div>
              <div class="card-body">

                <h5 class="card-title">Best Price Rates</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card bg-light" style="width: 100%">
              <div class="marketting-icons">
                <i class="fa fa-heart" aria-hidden="true"></i>
              </div>

              <div class="card-body">

                <h5 class="card-title">Best Customer Service</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>



    <!------------------------our partners section--------------------------------------------->

    <div class="partners">

      <div class="partners-header">
        <h2><u>Our Partners</u></h2>
      </div>
      
      <div class="container">
        <div class="row">

          <div class="col-md-3">
            
            <img src="images/benzlogo.jpg">
            <p>Mercedes Benz Kenya</p>
          </div>

          <div class="col-md-3">
            
            <img src="images/toyotalogo.png">
            <p>Toyota Kenya</p>
          </div>

          <div class="col-md-3">
            
            <img src="images/mazdalogo.jpg">
            <p>Mazda Kenya</p>
          </div>

          <div class="col-md-3">
            
            <img src="images/bmwlogo.png">
            <p>BMW Kenya</p>
           </div>
         </div>
       </div>
     </div>



<!-------------------------------foooter------------------------------------------------------------>

     <div class="footer">
       
       <div class="container">
         
         <div class="row">
           
           <div class="col-md-3">
             
            <h1>Useful Links</h1>
            <p><a href="index.php">Home</a></p>
            <p><a href="#">Privacy Policy</a></p>
            <p><a href="#">Terms And Conditions</a></p>
            <p><a href="#">Discount Coupon</a></p>
           </div>

           <div class="col-md-3">
             
            <h1>Company</h1>
            <p><a href="#">About Us</a></p>
            <p><a href="#">Contact</a></p>
            <p><a href="#">Career</a></p>
            <p><a href="#">FAQ</a></p>
           </div>

           <div class="col-md-3">
             
            <h1>Follow Us On</h1>
            <p><a href="#"><i class="fa fa-facebook-f"></i>Facebook</a></p>
            <p><a href="#"><i class="fa fa-twitter"></i>Twitter</a></p>
            <p><a href="#"><i class="fa fa-linkedin"></i>Linked-In</a></p>
            <p><a href="#"><i class="fa fa-instagram"></i>Instagram</a></p>
           </div>

           <div class="col-md-3">
             
            <h1>Send Us A Message</h1>
            
            <form method="POST">
              
              <input type="text" name="email" placeholder="Enter your email" class="footer-input">
              <textarea placeholder="Send Us Your Thoughts..." class="footer-textarea" name="Message"></textarea>
              <input type="submit" name="message-submit" value="Send Message" class="footer-submit">
            </form>

             <?php
             /*
              *php script to send messages/thoughts of users;
             */
                if (isset($_POST['message-submit'])) {
                  
                  $dao =  new Dao();

                  $dao->sendMessage($_POST['email'],$_POST['Message']);
                  echo $dao->get_error();

                }


            ?>

           </div>
         </div>

         <hr>

         <div class="download-app">
           
           <h2>Download Our App</h2>

             <img src="images/appstore.jpeg">
             <img src="images/googleplay.png">

         </div>

         <div class="copyright">
           
           <p>Copyright &copy Penguins Limited. ALL RIGHTS RESERVED
            <br>Terms & Conditions Apply</p>
         </div>
     </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
     

  </body>
</html>