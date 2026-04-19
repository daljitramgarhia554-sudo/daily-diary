<html>
<head>
<title>Age Eligibility Form</title>
<style>

body{
display:flex;
justify-content:center;
align-items:center;
height:100vh;
background-color:black;
font-family:Arial;
}

.container{
text-align:center;
background:white;
padding:60px;
border-radius:10px;
box-shadow:0px 4px 15px gray;
}




.popup{
display:none;
position:fixed;
top:50%;
left:50%;
transform:translate(-50%, -50%);
color:white;
padding:25px;
border-radius:10px;
box-shadow:0px 5px 20px black;
font-size:20px;
text-align:center;
}


.popup button{
margin-top:10px;
padding:8px 15px;
border:none;
background:white;

font-weight:bold;
cursor:pointer;
border-radius:5px;
}







</style>
<script>
function showPopup(message,color){

let popup = document.getElementById("popupBox");

popup.style.display = "block";
popup.style.backgroundColor = color;

document.getElementById("popupText").innerHTML = message;

}

function closePopup(){
document.getElementById("popupBox").style.display = "none";
}

</script>

</head>

<body>
<div class="container">

<h2>Age Eligibility Form</h2>

<form method="POST">
Enter Age: <input type="number" name="age" required><br><br>
<input type="submit" name="submit" value="Check">
</form>

</div>


<div class="popup" id="popupBox">
<p id="popupText"></p>
<button onclick="closePopup()">OK</button>
</div>

<?php

if(isset($_POST['submit'])){

$age = $_POST['age'];


if($age >= 18){
echo "<script>showPopup('Eligible for driving','green')</script>";
}
else{
echo "<script>showPopup('Not Eligible for driving','red')</script>";
}

}


?>

</body>
</html>
