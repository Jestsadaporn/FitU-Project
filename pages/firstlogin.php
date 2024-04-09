<?php
   include("../controller/conn.php");
   session_start();
   $error='';
   if($_SERVER["REQUEST_METHOD"] == "POST") {
   
      // username and password sent from form 
      $username = mysqli_real_escape_string($conn,$_POST['username']);
      $password = mysqli_real_escape_string($conn,$_POST['password']); 

      $sql = "SELECT * FROM user WHERE username = '$username' and password = '$password'";

      $result = mysqli_query($conn,$sql);      
      $row = mysqli_num_rows($result);      
      $count = mysqli_num_rows($result);

      if($count == 1) {
	  
         // session_register("username");
         $_SESSION['login_user'] = $username;
         header("location: ../controller/welcome.php");
      } else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="/css/login.css">
</head>

<body>
  <div class="container">
    <header
      class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <div class="col-md-3 mb-2 mb-md-0">
        <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
          <svg class="bi" width="40" height="32" role="img" aria-label="Bootstrap">
            <use xlink:href="#bootstrap"></use>
          </svg>
        </a>
      </div>
      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="#" class="nav-link px-2 link-secondary">Fit u </a></li>
        <li><a href="#" class="nav-link px-2 link-secondary">Settings </a></li>
        <li><a href="#" class="nav-link px-2 link-secondary">Language </a></li>
      </ul>

      <div class="col-md-3 text-end">
        <button type="button" class="btn btn-outline-primary me-2" id="gototrain"><a
            href="signupuser.html">Sign-up</a></button>
        <button type="button" class="btn btn-primary" id="gotosign-up"><a href="singuptriner.html">trinner</a></button>
      </div>
    </header>
  </div>

  <!-- form -->
  <main class="form-signin w-100 m-auto">
    <form action="" method="post">

      <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

      <div class="form-floating my-2">
        <input type="text" class="form-control" name="username" id="username" placeholder="Mr.example">
        <label for="floatingInput">Username</label>
      </div>
      <div class="form-floating my-2">
        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        <label for="floatingPassword">Password</label>
      </div>

      <div class="form-check text-start my-2">
        <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
          Remember me
        </label>
      </div>
      <button class="btn btn-primary w-100 py-2" type="submit" id="gotopage3"><a href="post.html">sing-in</a></button>
      <p>Don't have an account yet <a href="signupuser.html">click here</a></p>

    </form>
    <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>

  </main>
</body>

</html>