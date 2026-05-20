<?php
session_start();

if(!isset($_SESSION['username'])){
header("Location:login.php");
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Student Dashboard</title>

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

font-family:Arial,sans-serif;

background-image: url('https://st5.depositphotos.com/13803666/62535/i/450/depositphotos_625354888-stock-photo-stack-books-stationery-background-school.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover; 
font-family:Arial,sans-serif;

min-height:100vh;

color:black;

}

.navbar{

background:rgba(0,0,0,0.7) !important;

backdrop-filter:blur(10px);

padding:15px;

box-shadow:0px 4px 15px rgba(0,0,0,0.4);

}

.navbar-brand{

font-size:28px;

font-weight:bold;

letter-spacing:1px;

}

.dashboard-box{

background:rgba(255,255,255,0.1);

backdrop-filter:blur(15px);

padding:50px;

border-radius:25px;

box-shadow:0px 8px 30px rgba(0,0,0,0.5);

margin-top:70px;

animation:fadeIn 1s ease;

}

.welcome-text{

font-size:40px;

font-weight:bold;

margin-bottom:10px;

}

.sub-text{

font-size:18px;

color:#dcdcdc;

margin-bottom:40px;

}

.dashboard-btn{

height:60px;

font-size:20px;

font-weight:bold;

border-radius:15px;

transition:0.3s;

box-shadow:0px 5px 15px rgba(0,0,0,0.3);

}

.dashboard-btn:hover{

transform:translateY(-5px);

}

.card-box{

background:rgba(255,255,255,0.12);

padding:30px;

border-radius:20px;

text-align:center;

transition:0.3s;

height:100%;

}

.card-box:hover{

transform:scale(1.03);

background:rgba(255,255,255,0.18);

}

.card-icon{

font-size:60px;

margin-bottom:20px;

}




.sub-text{
color:black;

}


.footer-text{

margin-top:40px;

text-align:center;

font-size:15px;

color:black;

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

<nav class="navbar navbar-expand-lg navbar-dark">

<div class="container-fluid">

<span class="navbar-brand">
<i class="bi bi-mortarboard-fill"></i>
Student Dashboard
</span>

<a href="logout.php"
class="btn btn-danger px-4">

<i class="bi bi-box-arrow-right"></i>
Logout

</a>

</div>

</nav>

<div class="container">

<div class="dashboard-box">

<h1 class="welcome-text">

Welcome,
<?php echo $_SESSION['username']; ?>

</h1>

<p class="sub-text">

Manage your complaints easily through the
Student Complaint Management System.

</p>

<div class="row g-4">

<div class="col-md-6">

<div class="card-box">

<div class="card-icon text-primary">

<i class="bi bi-pencil-square"></i>

</div>

<h3 class="mb-3">

Register Complaint

</h3>

<p class="mb-4">

Submit your complaint directly to the authority with image upload support.

</p>

<a href="add_complaint.php"
class="btn btn-primary dashboard-btn w-100">

<i class="bi bi-plus-circle-fill"></i>
Add Complaint

</a>

</div>

</div>

<div class="col-md-6">

<div class="card-box">

<div class="card-icon text-danger">

<i class="bi bi-card-checklist"></i>

</div>

<h3 class="mb-3">

My Complaints

</h3>

<p class="mb-4">

Track complaint status, authority replies and principal updates.

</p>

<a href="my_complaints.php"
class="btn btn-danger dashboard-btn w-100">

<i class="bi bi-eye-fill"></i>
View Complaints

</a>

</div>

</div>

</div>

<div class="footer-text">

© 2026 Student Complaint Management System

</div>

</div>

</div>

</body>

</html>
