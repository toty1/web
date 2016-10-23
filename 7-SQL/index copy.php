<?php

if($_GET['city']) {
    
    $forecastpage =  file_get_contents("http://www.weather-forecast.com/location/london/forecast/latest");    
    echo $forecastpage;
    
}

?>





<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>weather scarper</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css" integrity="2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous">
      <style type="text/css">
      
      
       html { 
     background: url(pic.jpeg) no-repeat center center fixed; 
     -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
  }
      
          body {
              
              background: none;
              
          }
          
          .container {
              
              text-align-last: center;
              margin-top: 400px;
              width: 500px;
              
          }
          
         
      </style>
  </head>
  <body>
      
      <div class="container">
      
          <h1>what is the waether?</h1>
          
         
          
          <form>
  
    <fieldset class="form-group">
   
        <label class="enter a name of city"></label>
        <input type="text" class="form-control" name="city" id="city"  placeholder="london,tokyo,eg">
  </fieldset>
 
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
      
      </div>
     
      
      <img src="pic.jpeg">

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js" integrity="VjEeINv9OSwtWFLAtmc4JCtEJXXBub00gtSnszmspDLCtC0I4z4nqz7rEFbIZLLU" crossorigin="anonymous"></script>
          
      
  </body>
</html>