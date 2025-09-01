<?php
require "dbcon.php";
if (!empty($_SESSION['username']))
{
  header('location:home.php');
}

if(isset($_POST['register']))
{
  $name=$_POST['name'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $password=$_POST['password'];
  $cpassword=$_POST['cpassword'];
  $address=$_POST['address'];
  $duplicate=mysqli_query($con,"SELECT * FROM customer WHERE name='$name' OR email='$email'");
  if(mysqli_num_rows($duplicate)>0)
  {
    echo "<script>alert('name or email has been already taken');</script>";
  }
  else
  {
    if($password==$cpassword)
    {
      $sql="INSERT INTO customer VALUES('','$name','$email','$phone','$password','$address')";
      mysqli_query($con,$sql);
      echo "<script> alert('Your account has been created Successfully');</script>";
    }
    else
    {
      echo "<script>alert('The Password Doesn't Match');</scriprt>";
    }
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

    <title>Register</title>
    <style>
      body{
        background-color: skyblue;
      }
      .login{
        height: auto;
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
      <h1>Register</h1>
      <form method="POST" onsubmit="validate();">
        <input type="text" name="name" placeholder="Enter username" class="form-control mt-2 mb-2" id="name" value="">
        <input type="email" name="email" placeholder="Enter email" class="form-control mt-2 mb-2">
        <input type="number" name="phone" placeholder="Enter phone number" class="form-control mt-2 mb-2">
        <input type="password" name="password" placeholder="Enter Password" class="form-control mt-2 mb-2">
        <input type="password" name="cpassword" placeholder="Confirm Password" class="form-control mt-2 mb-2">
        <input type="text" name="address" placeholder="Enter Address" class="form-control mt-2 mb-2 p-4">
        <input type="submit" name="register" value="Register" class="btn btn-primary mt-2 mb-2">
        <br>
        <span>Login if you have an account</span>
        <br>
        <a href="login.php" class="btn btn-dark mt-2 mb-2">Login</a>
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
    <script>
      function validate()
      {
        var name=document.getElementById('name').value;
        if(name=="")
        {
          alert("username must be required")
        }
        elif(name==>3)
        {
          alert("Name is too short")
        }
      }
    </script>
  </body>
</html>