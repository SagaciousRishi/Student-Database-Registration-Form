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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href ="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <title>Student Registration</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-abhi">
  <a href="index.html" class="pull-left visible-md visible-lg">
            <div id="logo-img" style = "
  width: 150px;
  height: 154px;
  margin: 10px 15px 10px 0;">
  <img src = "images/a.png"></div>
          </a>

          <div class="navbar-brand pull-left">
            <a style = "color : #951C49; font-weight : bold;"><h1>MAIT</h1></a>
            <p>
              <img src="images/logo_new.png" >
            </p>
          </div>
  <a class="navbar-brand" href="#" style = "color : #951C49">Student Registration</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#" style = "color : #951C49">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php" style = "color : #951C49">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php" style = "color : #951C49">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php" style = "color : #951C49">Logout</a>
      </li>

      
     
    </ul>

  <div class="navbar-collapse collapse">
  <ul class="navbar-nav ml-auto">
  <li class="nav-item active">
        <a class="nav-link" href="#" style = "color : #951C49"> <img src="https://img.icons8.com/metro/26/000000/guest-male.png"> <?php echo "Welcome ". $_SESSION['username']?></a>
      </li>
  </ul>
  </div>


  </div>
</nav>
<div class = "container">
    <h3 style = "color : #951C49">Thankyou for your response.</h3>
</div>
</body>
</html>