<?php

session_start();

if(!isset($_SESSION['principal'])){

header("Location:principal_login.php");

}

include 'config.php';

if(isset($_POST['solve'])){

$id = $_POST['id'];

$message = $_POST['message'];

mysqli_query($conn,
"UPDATE comp SET
status='Resolved by Principal',
principal_message='$message'
WHERE id=$id");

}

$sql = "SELECT * FROM comp
WHERE status='Forwarded to Principal'";

$result = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html>
<head>

<title>Principal Panel</title>

<meta charset="utf-8">

<meta name="viewport"
content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

body{

background-image:url("https://img.freepik.com/free-photo/notepad-scissors-copy-space_23-2148475344.jpg?semt=ais_hybrid&w=740&q=80");

background-size:cover;

background-position:center;

min-height:100vh;

font-family:Arial,sans-serif;

}

.navbar{

background:linear-gradient(to right,#6610f2,#0d6efd) !important;

padding:15px;

box-shadow:0px 5px 20px rgba(0,0,0,0.4);

}

.navbar-brand{

font-size:30px;

font-weight:bold;

letter-spacing:1px;

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

color:#6610f2;

margin-bottom:30px;

}

.table{

border-radius:15px;

overflow:hidden;

}

.table thead{

background:linear-gradient(to right,#6610f2,#0d6efd);

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

background:#f5f7ff;

transform:scale(1.01);

}

.complaint-img{

width:120px;

height:120px;

object-fit:cover;

border-radius:15px;

border:3px solid #6610f2;

box-shadow:0px 4px 12px rgba(0,0,0,0.3);

}

.status-badge{

padding:10px 15px;

font-size:14px;

font-weight:bold;

border-radius:10px;

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

textarea{

border-radius:12px !important;

padding:12px !important;

resize:none;

}

.form-control:focus{

border-color:#6610f2;

box-shadow:0 0 10px rgba(102,16,242,0.3);

}

.btn-solve{

border-radius:10px;

font-weight:bold;

padding:10px;

transition:0.3s;

}

.btn-solve:hover{

transform:scale(1.03);

}

.footer-text{

text-align:center;

margin-top:20px;

color:black;

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

<nav class="navbar navbar-dark">

<div class="container-fluid">

<span class="navbar-brand">

<i class="bi bi-person-workspace"></i>
Principal Panel

</span>

<a href="logout.php"
class="btn btn-danger px-4">

<i class="bi bi-box-arrow-right"></i>
Logout

</a>

</div>

</nav>

<div class="container py-5">

<div class="main-card">

<h2 class="page-title">

<i class="bi bi-journal-check"></i>
Principal Complaint Management

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
<th>Message To Authority</th>

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

if($row['status']=="Forwarded to Principal"){

echo "<span class='status-badge pending'>
<i class='bi bi-clock-fill'></i>
Pending
</span>";

}
else{

echo "<span class='status-badge resolved'>
<i class='bi bi-check-circle-fill'></i>
Resolved
</span>";

}

?>

</td>

<td>

<form method="POST">

<input type="hidden"
name="id"
value="<?php echo $row['id']; ?>">

<textarea
name="message"
rows="4"
class="form-control mb-3"
placeholder="Write message to authority..."
required></textarea>

<button type="submit"
name="solve"
class="btn btn-success btn-solve w-100">

<i class="bi bi-check2-circle"></i>
Solve Complaint

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
