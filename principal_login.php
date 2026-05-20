<?php

session_start();

if(isset($_POST['login'])){

$username = $_POST['username'];
$password = $_POST['password'];

if($username=="principal" && $password=="12345"){

$_SESSION['principal']=$username;

header("Location:principal.php");

}else{

echo "<script>alert('Invalid Username or Password')</script>";

}

}

?>

<!DOCTYPE html>
<html>
<head>

<title>Principal Login</title>

<meta charset="utf-8">

<meta name="viewport"
content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

body{

margin:0;

padding:0;

height:100vh;

display:flex;

justify-content:center;

align-items:center;

background-image:url("https://static.vecteezy.com/system/resources/previews/034/460/708/non_2x/school-supplies-on-blue-background-back-to-school-concept-copy-space-school-supplies-on-blue-background-top-view-copy-space-ai-generated-free-photo.jpg");

background-size:cover;

background-position:center;

font-family:Arial,sans-serif;

overflow:hidden;

}

.login-card{

width:100%;

max-width:520px;

border:none;

border-radius:25px;

overflow:hidden;

box-shadow:0px 15px 40px rgba(0,0,0,0.5);

animation:fadeIn 1s ease;

background:white;

}

.card-header{

background:linear-gradient(to right,#6610f2,#0d6efd);

padding:45px;

text-align:center;

color:white;

}

.card-header h2{

font-size:38px;

font-weight:bold;

margin-bottom:10px;

}

.card-header p{

font-size:17px;

opacity:0.9;

}

.card-body{

padding:40px;

}

.input-group{

margin-bottom:25px;

}

.input-group-text{

background:#6610f2;

color:white;

border:none;

border-radius:12px 0 0 12px;

padding:15px;

font-size:18px;

}

.form-control{

height:58px;

border-radius:0 12px 12px 0;

font-size:16px;

padding-left:15px;

border:1px solid #ccc;

transition:0.3s;

}

.form-control:focus{

border-color:#6610f2;

box-shadow:0 0 12px rgba(102,16,242,0.3);

}

.btn-login{

height:58px;

font-size:20px;

font-weight:bold;

border:none;

border-radius:12px;

background:linear-gradient(to right,#6610f2,#0d6efd);

transition:0.3s;

color:white;

}

.btn-login:hover{

transform:scale(1.03);

}

.admin-box{

background:#f8f9fa;

padding:18px;

border-radius:12px;

margin-top:20px;

text-align:center;

font-size:15px;

color:#666;

}

.admin-box i{

font-size:22px;

color:#198754;

margin-right:5px;

}

.footer-text{

text-align:center;

margin-top:25px;

font-size:14px;

color:#888;

}

@keyframes fadeIn{

from{

opacity:0;

transform:translateY(-30px);

}

to{

opacity:1;

transform:translateY(0);

}

}

</style>

</head>

<body>

<div class="login-card">

<div class="card-header">

<h2>

<i class="bi bi-person-workspace"></i>
Principal Login

</h2>

<p>

Student Complaint Management System

</p>

</div>

<div class="card-body">

<form method="POST">

<div class="input-group">

<span class="input-group-text">

<i class="bi bi-person-fill"></i>

</span>

<input type="text"
name="username"
class="form-control"
placeholder="Enter Username"
required>

</div>

<div class="input-group">

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
class="btn btn-login w-100">

<i class="bi bi-box-arrow-in-right"></i>
Login

</button>

<div class="admin-box">

<i class="bi bi-shield-check"></i>

Secure Principal Access Portal

</div>

<div class="footer-text">

Only principal can access this dashboard.

</div>

</form>

</div>

</div>

</body>
</html>
