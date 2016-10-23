<html>
<body>

<!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" ></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js" ></script>
    
      <script type="text/javascript">
      
      $("#showloginform").click(function() {
                                
       $("#singup").toggle();
       $("#login").toggle();
       
                                
     });
   
      
        $(".toggleForms").click(function() {
            
            $("#signUpForm").toggle();
            $("#logInForm").toggle();
            
            
        });
          
          $('#dairy').bind('input propertychange', function() {
              
            
          $.ajax({
              
         method: "POST",
              
         url: "updatedatabase.php",
              
         data: { content: $("#dairy").val() }
              
     }); 
                           
});
     
          
  
      </script>
      
  </body>
</html>          
          
          
          
          
          
          
          
          