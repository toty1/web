<?php

session_start();


 if (array_key_exists("id" , $_cookie)){
     
   $_session['id'] = $_cookie['id'];
     
 }
    
       if (array_key_exists("id",$session)) {
           
           echo "<p>loggedin <a href='index.php?logout=1'>logout</a></p>";
           
       }else{
           
           header("location: loggedinpage.php");
       }
     
     
     ?>



    ?>
<?php include("header.php");?>
      
      <div class="container">
          
    <h1>secret diary</h1>
          
        
                    <p id="showloginform"> Welcome</p>

          <div id="singup">
          
            <form method="post">
                <fieldset class="form-group">
                 <input  class="form-control"type="email" name="email" placeholder="your email">
                </fieldset>
                <fieldset class="form-group">
                    <input  class="form-control"type="password" name="password" placeholder="password">
                </fieldset>
                <div class="form-check">
               <label class="form-check-label">
              <input class="form-check-input" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
             </label>
             </div>
                <fieldset class="form-group">
                    <input  class="form-control" type="hidden" name="signup" value="1">
                    <input  class="btn btn-success" type="submit" name="submit" value="sign up">
                </fieldset>
                  </form>
          </div>
          
          <div id="login">
            <form method="post">
                <fieldset class="form-group">
                 <input  class="form-control"type="email" name="email" placeholder="your email">
                </fieldset>
                <fieldset class="form-group">
                    <input  class="form-control"type="password" name="password" placeholder="password">
                </fieldset>
                <div class="form-check">
               <label class="form-check-label">
              <input class="form-check-input" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
             </label>
             </div>
                <fieldset class="form-group">
                    <input  class="form-control" type="hidden" name="login" value="1">
                    <input  class="btn btn-success" type="submit" name="submit" value="login">
                </fieldset>
                  </form>
          </div>
          
          
      </div>

    <?php include("footer.php"); ?>