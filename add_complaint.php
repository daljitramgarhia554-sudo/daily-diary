<?php

session_start();

include 'config.php';

if(isset($_POST['submit'])){

$name = $_SESSION['username'];

$title = $_POST['title'];

$text = $_POST['complaint'];

$image = $_FILES['image']['name'];

$temp_name = $_FILES['image']['tmp_name'];

$folder = "uploads/".$image;

move_uploaded_file($temp_name,$folder);

$sql = "INSERT INTO comp(
student_name,
complaint_title,
complaint_text,
complaint_image
)

VALUES(
'$name',
'$title',
'$text',
'$image'
)";

mysqli_query($conn,$sql);

echo "<script>alert('Complaint Submitted Successfully')</script>";

}

?>

<!DOCTYPE html>
<html>
<head>

<title>Add Complaint</title>

<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

body{

min-height:100vh;

background-image:url("https://images.rawpixel.com/image_800/cHJpdmF0ZS9sci9pbWFnZXMvd2Vic2l0ZS8yMDIzLTAzL3JtNjA0YmF0Y2gyLWJhY2tncm91bmQtYm0tMDItMDEtYS5qcGc.jpg");

background-size:cover;

background-position:center;

font-family:Arial,sans-serif;

display:flex;

justify-content:center;

align-items:center;

padding:30px;

}

.complaint-card{

width:100%;

max-width:750px;

border:none;

border-radius:25px;

overflow:hidden;

box-shadow:0px 15px 40px rgba(0,0,0,0.5);

animation:fadeIn 1s ease;

background:white;

}

.card-header{

background:linear-gradient(to right,#ff4da6,#ff1493);
padding:35px;

text-align:center;

color:white;

}

.card-header h2{

font-size:35px;

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

.form-label{

font-weight:bold;

margin-bottom:10px;

color:#333;

}

.form-control{

border-radius:12px;

padding:14px;

font-size:16px;

border:1px solid #ccc;

transition:0.3s;

}

.form-control:focus{

border-color:#6610f2;

box-shadow:0 0 10px rgba(102,16,242,0.3);

}

textarea{

resize:none;

}

.upload-box{

border:2px dashed #ff1493;

padding:20px;

border-radius:15px;

background:#fff0f6;

text-align:center;

margin-bottom:20px;

}

.upload-box i{

font-size:40px;

color:#6610f2;

margin-bottom:10px;

}

.btn-submit{

height:50px;

font-size:18px;

font-weight:bold;

border:none;

border-radius:12px;

background:linear-gradient(to right,#ff4da6,#ff1493);

transition:0.3s;

}

.btn-submit:hover{

background:linear-gradient(to right,#ff1493,#ff4da6);
transform:scale(1.02);
transition:0.3s;

}

.btn-back{

height:50px;

font-size:18px;

font-weight:bold;

border-radius:12px;

}

.footer-text{

text-align:center;

margin-top:20px;

color:#777;

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

<div class="complaint-card">

<div class="card-header">

<h2>
<i class="bi bi-exclamation-circle-fill"></i>
Register Complaint
</h2>

<p>
Student Complaint Management System
</p>

</div>

<div class="card-body">

<form method="POST" enctype="multipart/form-data">

<div class="mb-4">

<label class="form-label">
<i class="bi bi-card-heading"></i>
Complaint Title
</label>

<input type="text"
name="title"
class="form-control"
placeholder="Enter Complaint Title"
required>

</div>

<div class="mb-4">

<label class="form-label">
<i class="bi bi-chat-left-text-fill"></i>
Complaint Description
</label>

<textarea
name="complaint"
rows="5"
class="form-control"
placeholder="Write your complaint here..."
required></textarea>

</div>

<div class="upload-box">

<i class="bi bi-cloud-arrow-up-fill"></i>

<h5 class="mb-3">
Upload Complaint Image
</h5>

<input type="file"
name="image"
class="form-control"
accept="image/*"
required>

</div>

<div class="d-grid gap-3">

<button type="submit"
name="submit"
class="btn btn-submit text-white">

<i class="bi bi-send-fill"></i>
Submit Complaint

</button>

<a href="dashboard.php"
class="btn btn-dark btn-back">

<i class="bi bi-arrow-left-circle-fill"></i>
Back To Dashboard

</a>

</div>

<div class="footer-text">

Your complaint will be reviewed by the authority securely.

</div>

</form>

</div>

</div>

</body>
</html>
