<?php
$login =false;
$showError =false;

// Connect to the Database 

if($_SERVER["REQUEST_METHOD"]=="POST"){

  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "user";
  
  $conn = mysqli_connect($servername, $username, $password, $database);
  
  if (!$conn){
      die("Sorry we failed to connect: ". mysqli_connect_error());
  }
  if(isset($_POST['username'])){

  $user_name = $_POST["username"];
  $pass_word = $_POST["password"];
  
  
    $sql ="Select * from users where username ='$user_name' AND password ='$pass_word'";
    $result = mysqli_query($conn ,$sql);

    $num = mysqli_num_rows($result);
    
    if($num==1){
      $login = true ;
      session_start();
      $_SESSION['loggedin'] =true;
      $_SESSION['username'] =$user_name;

      header("location:index.php");
    }
    else{
      $showError = "Invalid Credentials ";
    }
  }

  }

?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <title>Crud app</title>
</head>

<body>

  <!--Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><img src="/curd/curd.png" height="28px" alt="" border-radius="2px"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#"> Home
            <span class="sr-only">(current)</span></a>

        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact Us</a>
        </li>

      </ul>
      <form action="/curd/sign_up.php" method="post" class="form-inline my-2 my-lg-0">
        <button class="btn btn-danger my-2 mx-1 my-sm-0" type="submit">Sing Up</button>
      </form>
      <form action="/curd/login.php" method="post">
        <button class="btn btn-danger my-2 my-sm-0" type="submit">Log In </button>
      </form>
    </div>
  </nav>
  <!--ALETS-->

  <?php
if($login){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong>You are login
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
  </button>
</div>
  ' ;
  
}
if($showError){
echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Error!</strong> '. $showError.'
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
</button>
</div>';
}


?>



  <!--FORM-->
  <div class="container my-4">
    <h1 class="text-center">Log In to our website</h1>
    <form action="/curd/login.php" method="post">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">

      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password">
      </div>


      <button type="submit" class="btn btn-primary">Log In</button>
    </form>
  </div>






  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
    crossorigin="anonymous"></script>

  <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>