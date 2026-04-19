<?php

$conn = mysqli_connect("localhost","root","password","FORM");

if(!$conn){
die("Connection Failed");
}

$sql = "SELECT * FROM files";
$result = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html>
<head>

<title>Student Records</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
background-image: url("https://img.freepik.com/free-photo/top-view-business-office-desk-background-applying-job-form-pen-pencil-eyeglasses-tree-wooden-table-background-with-copy-space_1921-21.jpg");
background-size: cover;
background-position: center;
background-repeat: no-repeat;
height: 100vh;
}

.card{
border-radius:15px;
box-shadow:0px 10px 30px rgba(0,0,0,0.3);
}

h2{
font-weight:bold;
}

</style>

</head>

<body>

<div class="container mt-5">

<div class="card p-4">

<h2 class="text-center text-light bg-success p-3 rounded">
🎓 Student Records
</h2>

<div class="table-responsive mt-3">

<table class="table table-hover table-bordered text-center align-middle">

<thead class="table-dark">
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Age</th>
<th>Course</th>
</tr>
</thead>

<tbody>

<?php

while($row = mysqli_fetch_assoc($result)){

echo "<tr>";
echo "<td>".$row['id']."</td>";
echo "<td>".$row['name']."</td>";
echo "<td>".$row['email']."</td>";
echo "<td>".$row['age']."</td>";
echo "<td>".$row['course']."</td>";
echo "</tr>";

}

?>

</tbody>

</table>

</div>

<div class="text-center mt-3">
<a href="index1.html" class="btn btn-lg btn-success shadow">
⬅ Back to Form
</a>
</div>

</div>

</div>

</body>
</html>
