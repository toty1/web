<?php

    session_start();

    if (array_key_exists("id", $_COOKIE)) {
        
        $_SESSION['id'] = $_COOKIE['id'];
        
    }

    if (array_key_exists("id", $_SESSION)) {
        
         echo "<p>Logged In! <a href='session.php?logout=1'>Log out</a></p>";
        
    } else {
        
        header("Location: index.php");  
    }

include("header.php");

?>

<nav class="navbar navbar-light bg-faded">
  <a class="navbar-brand" href="#">secritdairy</a>
  <ul class="nav navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="http://example.com" id="supportedContentDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
      <div class="dropdown-menu" aria-labelledby="supportedContentDropdown">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
      </div>
    </li>
  </ul>
  <form class="form-inline float-xs-right">
    <input class="form-control" type="text" placeholder="Search">
    <button class="btn btn-outline-success" type="submit">Search</button>
  </form>
</nav>

  <div class="container-fluid">
      
     <textarea id="dairy"></textarea> 
      
      
      
  </div>

<?php

include("footer.php");
?>


