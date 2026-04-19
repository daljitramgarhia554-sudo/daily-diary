<?php

$conn = mysqli_connect("localhost","root","password","FORM");

if(!$conn){
die("Connection Failed");
}

$name = $_POST['name'];
$email = $_POST['email'];
$age = $_POST['age'];
$course = $_POST['course'];

$sql = "INSERT INTO files(name,email,age,course)
VALUES('$name','$email','$age','$course')";

?>

<!DOCTYPE html>
<html>
<head>
<title>Student Registration</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<style>

body{
background-image: url("https://img.freepik.com/free-photo/clipboard-with-ribbons-candles_23-2147628613.jpg ");
background-size: cover;
background-position: center;
background-repeat: no-repeat;
height: 100vh;
}


.card{
border-radius:15px;
box-shadow:0px 10px 30px rgba(0,0,0,0.3);
}


th{
text-align:center;
font-weight:bold;
letter-spacing:1px;
}

td{
text-align:center;
}



</style>

</head>

<body>

<div class="container d-flex justify-content-center align-items-center vh-100">
<div class="row w-100 justify-content-center">
<div class="col-md-6">

<div class="card text-center p-4">

<?php

if(mysqli_query($conn,$sql)){
echo "<h2 class='text-success mb-3'>
<i class='bi bi-check-circle-fill'></i> Student Registered Successfully
</h2>";

echo "<table class='table table-striped table-hover table-bordered mt-4 shadow'>
<thead class='table-dark'>
<tr>
<th>Name</th>
<th>Email</th>
<th>Age</th>
<th>Course</th>
</tr>
</thead>

<tbody>
<tr>
<td>$name</td>
<td>$email</td>
<td>$age</td>
<td>$course</td>
</tr>
</tbody>
</table>";

echo "<a href='index1.html' class='btn btn-primary mt-3'>Back to Form</a>";
}
else{
echo "<div class='alert alert-danger'>Error inserting record</div>";
}




?>

</div>

</div>
</div>
</div>

</body>
</html>
