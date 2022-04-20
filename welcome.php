<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}

// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "login";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Die if connection was not successful

// Variables to be inserted into the table
$error = 0;
$elective = "";
if($_SERVER['REQUEST_METHOD'] == "POST"){
  $sql = "SELECT sno FROM elective WHERE username = ?";
  $stmt = mysqli_prepare($conn, $sql);
  if($stmt)
  {
      mysqli_stmt_bind_param($stmt, "s", $param_username);

      // Set the value of param username
      $param_username = $_SESSION['username'];

      // Try to execute this statement
      if(mysqli_stmt_execute($stmt)){
          mysqli_stmt_store_result($stmt);
          if(mysqli_stmt_num_rows($stmt) == 1)
          {
              
              $error = 1;
          }
          else{
            $error = 0;
          }
          }
        
        
  }
  mysqli_stmt_close($stmt);
        if($error == 0){

        
  $sql = "INSERT INTO elective (username, Elective) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if(isset($_POST["A"])){
      mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
      $elective = $_POST['A'];


      // Set these parameters
      $param_username = $_SESSION['username'];
      $param_password = $elective;
    }
    
    else{
      echo "Please select only one option";
    }
    if (mysqli_stmt_execute($stmt))
    {
        header("location: thankyou.php");
    }
    else{
        echo "Something went wrong... cannot redirect!";
    }
    mysqli_stmt_close($stmt);
  }
  else{
    header("location: bye.php");
    
  }
  
  mysqli_close($conn);
}

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
        <a class="nav-link" href="index.html" style = "color : #951C49">Home <span class="sr-only">(current)</span></a>
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

  <div class="navbar-collapse collapse" id ="colori">
  <ul class="navbar-nav ml-auto">
  <li class="nav-item active" >
        <a class="nav-link" href="#" style = "color : #951C49"> <img src="https://img.icons8.com/metro/26/000000/guest-male.png"> <?php echo "Welcome ". $_SESSION['username']?></a>
      </li>
  </ul>
  </div>


  </div>
</nav>

<div class="container mt-4" id ="colori">
<h3><?php echo "Welcome ". $_SESSION['username']?>!</h3>
<hr>
<h4> Please select your minor subject below</h4>


<form action="" method="post">
            <input type="radio" name="A" value="ML" >MACHINE LEARNING<br>
            <input type="radio" name="A" value="OOPS" >OOPS<br>
            <input type="radio" name="A" value="DBMS" >DBMS<br>
            <input type="radio" name="A" value="AI" >ARTIFICIAL INTELLIGENCE<br> 
            <input type="radio" name="A" value="OS" >OPERATING SYSTEM<br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
</div>

  

        


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>