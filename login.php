<?php
require "dbcon.php";
if (!empty($_SESSION['username']))
{
  header('location:index.php');
}

if(isset($_POST['login']))
 {
  $username=$_POST['username'];

  $password=$_POST['password'];
  $sql=mysqli_query($con,"SELECT * FROM customer WHERE name='$username' OR email='$username'");
  $row=mysqli_fetch_array($sql);
  if(mysqli_num_rows($sql)>0)
  {
    if($password==$row['password'])
    {
      $_SESSION['id']=true;
      $_SESSION['username']=$row['name'];
      header('location:index.php');

    }
    else
    {
      echo "<script>alert('password does not matched');</script>";
    }

  }
  else
  {
    echo "<script>alert('Create Your Account');</script>";
  }

 } 
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Login</title>
    <style>
      body{
        background-color: skyblue;
      }
      .login{
        height: 400px;
        background-color: white;
        border-radius: 20px;
        opacity: 0.9;
      }
      .login h1{
        color: white;
        background: linear-gradient(135deg,grey,lightgrey,black);
        text-align: center;
      }
      .login span{
        color: blue;
        font-size: 18px;
        font-style: italic; 
      }
    </style>
  </head>
  <body>
    <div class="container login col-lg-6 mt-5">
      <h1>Login Now</h1>
      <form method="POST">
        <input type="text" name="username" placeholder="Enter username" class="form-control mt-2 mb-2">
        <input type="password" name="password" placeholder="Enter Password" class="form-control mt-2 mb-2">
        <input type="submit" name="login" value="Login" class="btn btn-primary mt-2 mb-2">
        <br>
        <span>If you have you have no account then signup</span>
        <br>
        <a href="register.php" class="btn btn-dark mt-2 mb-2">Register</a>
      </form>
      
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>