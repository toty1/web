<?php

    session_start();

    $error = "";    

    if (array_key_exists("logout", $_GET)) {
        
        unset($_SESSION);
        setcookie("id", "", time() - 60*60);
        $_COOKIE["id"] = "";  
        
    } else if ((array_key_exists("id", $_SESSION) AND $_SESSION['id']) OR (array_key_exists("id", $_COOKIE) AND $_COOKIE['id'])) {
        
        header("Location: loggedinpage.php");
        
    }

    if (array_key_exists("submit", $_POST)) {
        
        $link = mysqli_connect("localhost", "root", "", "secritbi");
        
        if (mysqli_connect_error()) {
            
            die ("Database Connection Error");
            
        }
        
        
        
        if (!$_POST['email']) {
            
            $error .= "An email address is required<br>";
            
        } 
        
        if (!$_POST['password']) {
            
            $error .= "A password is required<br>";
            
        } 
        
        if ($error != "") {
            
            $error = "<p>There were error(s) in your form:</p>".$error;
            
        } else {
            
            if ($_POST['signUp'] == '1') {
            
                $query = "SELECT id FROM `users` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";

                $result = mysqli_query($link, $query);

                if (mysqli_num_rows($result) > 0) {

                    $error = "That email address is taken.";

                } else {

                    $query = "INSERT INTO `users` (`email`, `password`) VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."', '".mysqli_real_escape_string($link, $_POST['password'])."')";

                    if (!mysqli_query($link, $query)) {

                        $error = "<p>Could not sign you up - please try again later.</p>";

                    } else {

                        $query = "UPDATE `users` SET password = '".md5(md5(mysqli_insert_id($link)).$_POST['password'])."' WHERE id = ".mysqli_insert_id($link)." LIMIT 1";

                        mysqli_query($link, $query);
                        
                        echo "sign in successful";

                        $_SESSION['id'] = mysqli_insert_id($link);

                        if ($_POST['stayLoggedIn'] == '1') {

                            setcookie("id", mysqli_insert_id($link), time() + 60*60*24*365);

                        } 

                        header("Location: loggedinpage.php");

                    }

                } 
                
            } else {
                    
                    $query = "SELECT * FROM `users` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."'";
                
                    $result = mysqli_query($link, $query);
                
                    $row = mysqli_fetch_array($result);
                
                    if (isset($row)) {
                        
                        $hashedPassword = md5(md5($row['id']).$_POST['password']);
                        
                        if ($hashedPassword == $row['password']) {
                            
                            $_SESSION['id'] = $row['id'];
                            
                            if ($_POST['stayLoggedIn'] == '1') {

                                setcookie("id", $row['id'], time() + 60*60*24*365);

                            } 

                            header("Location: loggedinpage.php");
                        
                    
                    
                
                        } else {
                            
                            echo "That email/password combination could not be found.";
                            
                        }
                        
                    } else {
                        
                        $error = "That email/password combination could not be found.";
                        
                    }
                    
                }
            
        }
        
        
    }


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
      
      <style type="text/css">
      
      
          .container {
              
              
              text-align: center;
              width: 400px;
          }
          
          #logginform {
              
              display: none;
          }
      
       
      
      </style>
  </head>
  <body>
      
      <?php include("header.php"); ?>
      
      <div class="container"  id="homepagecontainer">
         
          
    <h1>secritdairy</h1>
          
          
          <div id="error"><?php if ($error ="") {
    
         echo' <div class="alert alert-danger" role="alert">'.$error.'</div>';
              
              
           } ?> </div>
          
          <form method="post" id = "signupform">
              
     <fieldset class="form-group">

           <input  class="form-control" type="email" name="email" placeholder="Your Email">
             
         
     </fieldset>
              
     <fieldset class="form-group">  
    
         <input class="form-control" type="password" name="password" placeholder="Password">
              
     </fieldset>
         
     <div class="form-check">
        
    <label>
    
    
         <input  type="checkbox" name="stayLoggedIn" value=1>
        
        stay logged in
        
        </label>
    </div>
          
         <input  type="hidden" name="signUp" value="1">
                  
    <fieldset class="form-group">
        
         <input class="btn btn-success"  type="submit" name="submit" value="Sign Up!">
        
    </fieldset>
              
              <p><a class="toggleforms">loggin</a></p>
    

</form>

<form method="post" id = "logginform">
   
              
     <fieldset class="form-group">  
    

        <input class="form-control"  type="email" name="email" placeholder="Your Email">
         
     </fieldset>
              
     <fieldset class="form-group">  
    
    
         <input class="form-control" type="password" name="password" placeholder="Password">
         
     </fieldset>
              
    <div class="form-check">
        
    <label>
    
    
         <input  type="checkbox" name="stayLoggedIn" value=1>
        
        stay logged in
        
        </label>
    </div>
        
         <input  type="hidden" name="signUp" value="0">
         
    
              
     <fieldset class="form-group">  
    
        
          <input class="btn btn-success" type="submit" name="submit" value="Log In!">
         
     </fieldset>
              
      
       <p><a class="toggleforms">signupform</a></p>

</form>
          
          </div>
      
      <?php include("footer.php"); ?>
      
      <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
      
      
      <script type="text/javascript">
          
       $(".toggleforms").click(function() {
                                
       $("#singupform").toggle();
       $("#logginform").toggle();
       
                                
     });
      
      
      
      
      
      
      </script>
      
  </body>

    
</html>

 <div id="error"><?php echo $error; ?></div>

