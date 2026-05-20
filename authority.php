<?php

session_start();

if(!isset($_SESSION['authority'])){

header("Location:authority_login.php");

}

include 'config.php';

if(isset($_GET['resolve'])){

$id = $_GET['resolve'];

mysqli_query($conn,
"UPDATE comp SET status='Resolved by Authority' WHERE id=$id");

}

if(isset($_GET['forward'])){

$id = $_GET['forward'];

mysqli_query($conn,
"UPDATE comp SET status='Forwarded to Principal' WHERE id=$id");

header("Location:principal_login.php");

}

if(isset($_POST['send'])){

$id = $_POST['id'];

$message = $_POST['message'];

mysqli_query($conn,
"UPDATE comp SET authority_message='$message'
WHERE id=$id");

}

$sql = "SELECT * FROM comp";

$result = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html>
<head>

<title>Authority Panel</title>

<meta charset="utf-8">

<meta name="viewport"
content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

body{

background-image:url("https://img.freepik.com/premium-photo/pastel-pink-back-school-product-display-podium-stand-side-with-pencils-books-table_611870-2623.jpg");
background-size:cover;

background-position:center;

min-height:100vh;

font-family:Arial,sans-serif;

}



.custom-navbar{

background:MediumSlateBlue  ;

backdrop-filter:blur(15px);

padding:14px 0;

border-bottom:1px solid rgba(255,255,255,0.2);

box-shadow:0px 4px 25px rgba(0,0,0,0.3);

}

.logo-circle{

width:60px;

height:60px;

background:linear-gradient(135deg,#0d6efd,#6610f2);

border-radius:18px;

display:flex;

justify-content:center;

align-items:center;

font-size:30px;

color:black;

box-shadow:0px 4px 15px rgba(0,0,0,0.3);

}

.navbar-brand h4{

font-size:24px;

letter-spacing:1px;

}

.nav-link{

color:white !important;

font-size:16px;

font-weight:600;

padding:10px 18px !important;

border-radius:12px;

transition:0.3s;

}

.nav-link:hover{

background:Coral;

transform:translateY(-2px);

}

.logout-btn{

background:linear-gradient(to right,#ff416c,#ff4b2b);

color:white;

font-weight:bold;

padding:10px 24px;

border-radius:50px;

border:none;

transition:0.3s;

box-shadow:0px 5px 15px rgba(255,75,43,0.4);

}

.logout-btn:hover{

transform:scale(1.05);

color:white;

}

.navbar-toggler{

background:white;

border:none;

padding:8px 12px;

border-radius:10px;

}

.navbar-toggler:focus{

box-shadow:none;

}






.main-card{

background:white;

border-radius:25px;

padding:30px;

box-shadow:0px 10px 35px rgba(0,0,0,0.5);

animation:fadeIn 1s ease;

}

.page-title{

font-size:38px;

font-weight:bold;

text-align:center;

color:#0d6efd;

margin-bottom:30px;

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

vertical-align:middle;

}

.table td{

padding:18px;

text-align:center;

vertical-align:middle;

font-size:15px;

}

.table tbody tr{

transition:0.3s;

}

.table tbody tr:hover{

background:#f4f7ff;

transform:scale(1.01);

}

.complaint-img{

width:110px;

height:110px;

object-fit:cover;

border-radius:15px;

border:3px solid #0d6efd;

box-shadow:0px 4px 10px rgba(0,0,0,0.3);

}

.status-box{

padding:10px 15px;

border-radius:10px;

font-weight:bold;

font-size:14px;

display:inline-block;

}

.pending{

background:#ffc107;

color:black;

}

.resolved{

background:#198754;

color:white;

}

.forwarded{

background:#0dcaf0;

color:black;

}

.message-box{

background:#f8f9fa;

padding:12px;

border-radius:12px;

font-weight:500;

min-width:150px;

}

.form-control{

border-radius:10px;

padding:10px;

}

.btn{

border-radius:10px;

font-weight:bold;

transition:0.3s;

}

.btn:hover{

transform:scale(1.04);

}

.footer-text{

text-align:center;

margin-top:20px;

color:#ddd;

font-size:15px;

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

<nav class="navbar navbar-expand-lg custom-navbar">

<div class="container-fluid px-4">

<a class="navbar-brand d-flex align-items-center" href="#">

<div class="logo-circle me-3">

<i class="bi bi-shield-check"></i>

</div>

<div>

<h4 class="mb-0 fw-bold text-white">
Authority Panel
</h4>

<small class="text-light">
Complaint Management System
</small>

</div>

</a>

<button class="navbar-toggler"
type="button"
data-bs-toggle="collapse"
data-bs-target="#navbarNav">

<span class="navbar-toggler-icon"></span>

</button>

<div class="collapse navbar-collapse justify-content-end"
id="navbarNav">

<ul class="navbar-nav align-items-center">

<li class="nav-item me-2">

<a class="nav-link active" href="authority.php">

<i class="bi bi-speedometer2"></i>
Dashboard

</a>

</li>

<li class="nav-item me-2">

<a class="nav-link" href="#">

<i class="bi bi-journal-text"></i>
Complaints

</a>

</li>

<li class="nav-item me-2">

<a class="nav-link" href="#">

<i class="bi bi-bell-fill"></i>
Notifications

</a>

</li>

<li class="nav-item me-3">

<a class="nav-link" href="#">

<i class="bi bi-person-circle"></i>
Authority

</a>

</li>

<li class="nav-item">

<a href="logout.php"
class="btn logout-btn">

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

<i class="bi bi-journal-text"></i>
Authority Complaint Management

</h2>

<div class="table-responsive">

<table class="table table-bordered table-hover align-middle">

<thead>

<tr>

<th>ID</th>
<th>Student</th>
<th>Title</th>
<th>Complaint</th>
<th>Image</th>
<th>Status</th>
<th>Principal Message</th>
<th>Action</th>

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

<?php echo $row['student_name']; ?>

</td>

<td>

<?php echo $row['complaint_title']; ?>

</td>

<td>

<?php echo $row['complaint_text']; ?>

</td>

<td>

<img src="uploads/<?php echo $row['complaint_image']; ?>"
class="complaint-img">

</td>

<td>

<?php

if($row['status']=="Resolved by Authority"){

echo "<span class='status-box resolved'>
Resolved
</span>";

}
else if($row['status']=="Forwarded to Principal"){

echo "<span class='status-box forwarded'>
Forwarded
</span>";

}
else{

echo "<span class='status-box pending'>
Pending
</span>";

}

?>

</td>

<td>

<div class="message-box">

<?php

if($row['principal_message']!=""){

echo $row['principal_message'];

}else{

echo "No Message";

}

?>

</div>

</td>

<td>

<a href="authority.php?resolve=<?php echo $row['id']; ?>"
class="btn btn-info btn-sm mb-2 w-100">

<i class="bi bi-check-circle-fill"></i>
Resolve

</a>

<a href="authority.php?forward=<?php echo $row['id']; ?>"
class="btn btn-secondary btn-sm mb-2 w-100">

<i class="bi bi-arrow-right-circle-fill"></i>
Forward

</a>

<form method="POST">

<input type="hidden"
name="id"
value="<?php echo $row['id']; ?>">

<input type="text"
name="message"
class="form-control mb-2"
placeholder="Send message to student"
required>

<button type="submit"
name="send"
class="btn btn-primary btn-sm w-100">

<i class="bi bi-send-fill"></i>
Send To Student

</button>

</form>

</td>

</tr>

<?php
}
?>

</tbody>

</table>

</div>

</div>

<div class="footer-text">

Student Complaint Management System © 2026

</div>

</div>

</body>
</html>
