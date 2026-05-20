<?php

session_start();

include 'config.php';

if(isset($_POST['login'])){

$username = $_POST['username'];

$password = $_POST['password'];

$sql = "SELECT * FROM complaint 
WHERE username='$username' 
AND password='$password'";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)==1){

$_SESSION['username']=$username;

header("Location:dashboard.php");
exit();

}else{

echo "<script>alert('Invalid Login')</script>";

}

}

?>

<!DOCTYPE html>
<html>
<head>

<title>Student Login</title>

<meta charset="utf-8">

<meta name="viewport"
content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
}

body{

height:100vh;

display:flex;

justify-content:center;

align-items:center;

background-image:url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRVw0XOoPIybUevV6ezAlb7cM38O62BdzS1pA&s');

background-repeat:no-repeat;

background-size:cover;

background-position:center;

font-family:Arial,sans-serif;

overflow:hidden;

position:relative;

}

body::before{

content:"";

position:absolute;

top:0;

left:0;

width:100%;

height:100%;



}

.login-card{

width:100%;

max-width:450px;

border:none;

border-radius:25px;

overflow:hidden;

box-shadow:0px 15px 40px rgba(0,0,0,0.5);

animation:fadeIn 1s ease;

position:relative;

z-index:10;

background:white;

}

.card-header{

background:linear-gradient(to right,#198754,#20c997);

padding:35px;

text-align:center;

color:white;

}

.card-header h2{

font-weight:bold;

margin-bottom:10px;

font-size:35px;

}

.card-header p{

font-size:15px;

opacity:0.9;

}

.card-body{

padding:40px;

background:white;

}

.form-control{

height:55px;

border-radius:12px;

font-size:16px;

border:1px solid #ccc;

box-shadow:none !important;

}

.form-control:focus{

border-color:#198754;

box-shadow:0px 0px 10px rgba(25,135,84,0.3) !important;

}

.input-group-text{

background:#198754;

color:white;

border:none;

border-radius:12px 0 0 12px;

padding:0 18px;

font-size:18px;

}

.btn-login{

height:55px;

border:none;

border-radius:12px;

font-size:18px;

font-weight:bold;

background:linear-gradient(to right,#198754,#20c997);

transition:0.3s;

box-shadow:0px 5px 15px rgba(25,135,84,0.4);

}

.btn-login:hover{

transform:translateY(-2px);

box-shadow:0px 8px 18px rgba(25,135,84,0.5);

}

.register-link{

text-decoration:none;

font-weight:bold;

color:#198754;

transition:0.3s;

}

.register-link:hover{

color:#146c43;

text-decoration:underline;

}

.footer-text{

font-size:14px;

color:gray;

text-align:center;

margin-top:20px;

}

.icon-circle{

width:80px;

height:80px;

background:rgba(255,255,255,0.2);

border-radius:50%;

display:flex;

justify-content:center;

align-items:center;

margin:auto;

margin-bottom:15px;

font-size:40px;

backdrop-filter:blur(5px);

}

@keyframes fadeIn{

from{

opacity:0;

transform:translateY(-25px);

}

to{

opacity:1;

transform:translateY(0);

}

}

</style>

</head>

<body>

<div class="card login-card">

<div class="card-header">

<div class="icon-circle">

<i class="bi bi-person-circle"></i>

</div>

<h2>
Student Login
</h2>

<p class="mb-0">
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
<i class="bi bi-lock-fill"></i>
</span>

<input type="password"
name="password"
class="form-control"
placeholder="Enter Password"
required>

</div>

<button type="submit"
name="login"
class="btn btn-login text-white w-100">

<i class="bi bi-box-arrow-in-right"></i>
Login

</button>



<div class="footer-text">

<i class="bi bi-shield-lock-fill"></i>
Secure Student Complaint Portal

</div>

</form>

</div>

</div>

</body>
</html>
