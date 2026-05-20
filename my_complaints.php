<?php

session_start();

include 'config.php';

$name = $_SESSION['username'];

$sql = "SELECT * FROM comp WHERE student_name='$name'";

$result = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html>
<head>

<title>My Complaints</title>

<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

body{

background-image:url("https://pngmagic.com/webp_images/modern-teachers-day-background-for-invitation-card_J1CT.webp");

background-size:cover;

background-position:center;

min-height:100vh;

font-family:Arial,sans-serif;

}


.navbar{

background:linear-gradient(135deg,#4e54c8,#8f94fb);

padding:15px 10px;

backdrop-filter:blur(10px);

border-bottom:2px solid rgba(255,255,255,0.2);

}

.logo-box{

width:55px;

height:55px;

background:rgba(255,255,255,0.2);

border-radius:15px;

display:flex;

justify-content:center;

align-items:center;

font-size:28px;

color:white;

box-shadow:0px 4px 12px rgba(0,0,0,0.3);

}

.navbar-brand h4{

font-size:24px;

letter-spacing:1px;

}

.nav-link{

font-size:16px;

font-weight:600;

color:white !important;

padding:10px 18px !important;

border-radius:10px;

transition:0.3s;

}

.nav-link:hover{

background:rgba(255,255,255,0.2);

transform:translateY(-2px);

}

.btn-danger{

border:none;

padding:10px 22px;

font-size:15px;

transition:0.3s;

box-shadow:0px 4px 10px rgba(0,0,0,0.2);

}

.btn-danger:hover{

transform:scale(1.05);

}

.navbar-toggler{

border:none;

background:white;

border-radius:8px;

padding:6px 10px;

}


.main-card{

background:white;

border-radius:25px;

padding:30px;

box-shadow:0px 10px 35px rgba(0,0,0,0.4);

animation:fadeIn 1s ease;

}

.page-title{

font-size:35px;

font-weight:bold;

color:#0d6efd;

margin-bottom:25px;

text-align:center;

}

.table{

border-radius:15px;

overflow:hidden;

}

.table thead{

background:linear-gradient(to right,#0d6efd,#6610f2);

color:white;

}

.table th{

padding:18px;

font-size:16px;

text-align:center;

}

.table td{

padding:18px;

vertical-align:middle;

text-align:center;

font-size:15px;

}

.table tbody tr{

transition:0.3s;

}

.table tbody tr:hover{

background:#f5f7ff;

transform:scale(1.01);

}

.badge{

padding:10px 15px;

font-size:14px;

border-radius:10px;

}

.message-box{

background:#f8f9fa;

padding:10px;

border-radius:10px;

font-weight:500;

}

.btn-back{

padding:12px 30px;

font-size:17px;

font-weight:bold;

border-radius:12px;

transition:0.3s;

}

.btn-back:hover{

transform:scale(1.05);

}

.footer-text{

text-align:center;

margin-top:20px;

color:#666;

font-size:14px;

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

<nav class="navbar navbar-expand-lg navbar-dark shadow-lg">

<div class="container-fluid px-4">

<a class="navbar-brand d-flex align-items-center" href="#">

<div class="logo-box me-3">

<i class="bi bi-shield-check"></i>

</div>

<div>

<h4 class="mb-0 fw-bold">
Student Complaint Portal
</h4>

<small class="text-light">
Complaint Management System
</small>

</div>

</a>

<button class="navbar-toggler"
type="button"
data-bs-toggle="collapse"
data-bs-target="#navbarContent">

<span class="navbar-toggler-icon"></span>

</button>

<div class="collapse navbar-collapse justify-content-end"
id="navbarContent">

<ul class="navbar-nav align-items-center">

<li class="nav-item me-3">

<a href="dashboard.php"
class="nav-link active">

<i class="bi bi-house-door-fill"></i>
Dashboard

</a>

</li>

<li class="nav-item me-3">

<a href="add_complaint.php"
class="nav-link">

<i class="bi bi-pencil-square"></i>
Add Complaint

</a>

</li>

<li class="nav-item me-3">

<a href="my_complaints.php"
class="nav-link">

<i class="bi bi-chat-left-text-fill"></i>
My Complaints

</a>

</li>

<li class="nav-item">

<a href="logout.php"
class="btn btn-danger px-4 fw-bold rounded-pill">

<i class="bi bi-box-arrow-right"></i>
Logout

</a>

</li>

</ul>

</div>

</div>

</nav>

<div class="container py-5">

<div class="main-card">

<h2 class="page-title">

<i class="bi bi-chat-left-dots-fill"></i>
My Complaints

</h2>

<div class="table-responsive">

<table class="table table-bordered table-hover align-middle">

<thead>

<tr>

<th>ID</th>
<th>Title</th>
<th>Complaint</th>
<th>Status</th>
<th>Authority Message</th>

</tr>

</thead>

<tbody>

<?php
while($row=mysqli_fetch_assoc($result)){
?>

<tr>

<td>

<strong>
#<?php echo $row['id']; ?>
</strong>

</td>

<td>

<?php echo $row['complaint_title']; ?>

</td>

<td>

<?php echo $row['complaint_text']; ?>

</td>

<td>

<?php

if($row['status']=='Resolved by Authority'){

echo "<span class='badge bg-success'>
<i class='bi bi-check-circle-fill'></i>
Resolved by Authority
</span>";

}
else if($row['status']=='Forwarded to Principal'){

echo "<span class='badge bg-warning text-dark'>
<i class='bi bi-arrow-right-circle-fill'></i>
Forwarded to Principal
</span>";

}
else if($row['status']=='Resolved by Principal'){

echo "<span class='badge bg-primary'>
<i class='bi bi-person-check-fill'></i>
Resolved by Principal
</span>";

}
else{

echo "<span class='badge bg-danger'>
<i class='bi bi-clock-fill'></i>
Pending
</span>";

}

?>

</td>

<td>

<div class="message-box">

<?php

if($row['authority_message']!=""){

echo $row['authority_message'];

}else{

echo "<span class='text-muted'>
No Message
</span>";

}

?>

</div>

</td>

</tr>

<?php
}
?>

</tbody>

</table>

</div>

<div class="text-center mt-4">

<a href="dashboard.php"
class="btn btn-dark btn-back">

<i class="bi bi-arrow-left-circle-fill"></i>
Back To Dashboard

</a>

</div>

<div class="footer-text">

Student Complaint Management System © 2026

</div>

</div>

</div>

</body>
</html>
