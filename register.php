<?php

include 'config.php';

if(isset($_POST['register'])){

$username = $_POST['username'];

$email = $_POST['email'];

$password = $_POST['password'];

$sql = "INSERT INTO complaint(username,email,password)
VALUES('$username','$email','$password')";

mysqli_query($conn,$sql);

header("Location:login.php");

}

?>

<!DOCTYPE html>
<html>
<head>

<title>Student Register</title>

<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

body{

height:100vh;

display:flex;

justify-content:center;

align-items:center;

background-image: url('https://i.pinimg.com/736x/60/22/52/602252b4b408f8b8902c94868e6f3ced.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover; 
font-family:Arial,sans-serif;


}

.register-card{

width:100%;

max-width:500px;

border:none;

border-radius:20px;

overflow:hidden;

box-shadow:0px 10px 30px rgba(0,0,0,0.4);

animation:fadeIn 1s ease;

}

.card-header{

background:linear-gradient(to right,#0d6efd,#6610f2);

padding:30px;

text-align:center;

color:white;

}

.card-header h2{

font-weight:bold;

margin:0;

}

.card-body{

padding:40px;

background:white;

}

.form-control{

height:50px;

border-radius:10px;

}

.input-group-text{

border-radius:10px 0 0 10px;

background:#0d6efd;

color:white;

border:none;

}

.btn-register{

height:50px;

border-radius:10px;

font-size:18px;

font-weight:bold;

background:linear-gradient(to right,#0d6efd,#6610f2);

border:none;

transition:0.3s;

}

.btn-register:hover{

transform:scale(1.03);

}

.login-btn{

height:50px;

border-radius:10px;

font-size:17px;

font-weight:bold;

}

@keyframes fadeIn{

from{

opacity:0;

transform:translateY(-20px);

}

to{

opacity:1;

transform:translateY(0);

}

}

</style>

</head>

<body>

<div class="card register-card">

<div class="card-header">

<h2>
<i class="bi bi-person-plus-fill"></i>
Student Registration
</h2>

<p class="mt-2 mb-0">
Complaint Management System
</p>

</div>

<div class="card-body">

<form method="POST">

<div class="input-group mb-4">

<span class="input-group-text">
<i class="bi bi-person-fill"></i>
</span>

<input type="text"
name="username"
class="form-control"
placeholder="Enter Username"
required>

</div>

<div class="input-group mb-4">

<span class="input-group-text">
<i class="bi bi-envelope-fill"></i>
</span>

<input type="email"
name="email"
class="form-control"
placeholder="Enter Email"
required>

</div>

<div class="input-group mb-4">

<span class="input-group-text">
<i class="bi bi-lock-fill"></i>
</span>

<input type="password"
name="password"
class="form-control"
placeholder="Enter Password"
required>

</div>

<button type="submit"
name="register"
class="btn btn-register text-white w-100 mb-3">

<i class="bi bi-check-circle-fill"></i>
Register

</button>

<a href="login.php"
class="btn btn-success login-btn w-100">

<i class="bi bi-box-arrow-in-right"></i>
Already Have Account? Login

</a>

</form>

</div>

</div>

</body>
</html>
