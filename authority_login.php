<?php

session_start();

if(isset($_POST['login'])){

$username = $_POST['username'];
$password = $_POST['password'];

if($username=="authority" && $password=="12345"){

$_SESSION['authority'] = $username;

header("Location:authority.php");
exit();

}else{

echo "<script>alert('Invalid Username or Password')</script>";

}

}

?>

<!DOCTYPE html>
<html>
<head>

<title>Authority Login</title>

<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

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

background-image:url('https://static.vecteezy.com/system/resources/thumbnails/071/376/409/small/purple-and-white-flowers-rest-on-a-lavender-background-photo.jpg');

background-size:cover;
background-position:center;
background-repeat:no-repeat;

font-family:Arial,sans-serif;

}

.login-card{

width:100%;
max-width:500px;

border:none;
border-radius:25px;

overflow:hidden;

background:white;

box-shadow:0px 15px 40px rgba(0,0,0,0.4);

animation:fadeIn 1s ease;

backdrop-filter:blur(5px);

}

.card-header{

background:linear-gradient(to right,#ee82ee,#da70d6);

padding:40px;

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
margin:0;
opacity:0.9;

}

.card-body{

padding:40px;

}

.input-group{

margin-bottom:25px;

}

.input-group-text{

background:#ee82ee;

color:white;

border:none;

border-radius:12px 0 0 12px;

padding:15px;

font-size:18px;

}

.form-control{

height:55px;

border-radius:0 12px 12px 0;

font-size:16px;

padding-left:15px;

border:1px solid #ccc;

box-shadow:none;

transition:0.3s;

}

.form-control:focus{

border-color:#da70d6;

box-shadow:0 0 12px rgba(218,112,214,0.4);

}

.btn-login{

height:55px;

font-size:20px;

font-weight:bold;

border:none;

border-radius:12px;

background:linear-gradient(to right,#ee82ee,#da70d6);

transition:0.3s;

}

.btn-login:hover{

transform:scale(1.03);

background:linear-gradient(to right,#da70d6,#ee82ee);

}

.security-box{

background:#f8f9fa;

border-radius:12px;

padding:15px;

text-align:center;

margin-top:20px;

font-size:15px;

color:#666;

}

.security-box i{

color:#198754;

font-size:20px;

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

<i class="bi bi-shield-lock-fill"></i>
Authority Login

</h2>

<p>
Complaint Management System
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
class="btn btn-login text-white w-100">

<i class="bi bi-box-arrow-in-right"></i>
Login

</button>

<div class="security-box">

<i class="bi bi-shield-check"></i>

Secure Authority Access Portal

</div>

<div class="footer-text">

Only authorized staff can access this panel.

</div>

</form>

</div>

</div>

</body>
</html>
