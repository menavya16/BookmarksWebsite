<!DOCTYPE html>
<html>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="style.css?v={random number/string}" type="text/css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <title>Register</title>
    <meta charset="utf-8"/>
    <style>
    body{
      background-image: url("bg.jpg");
    }
    </style>
  </head>
  <div class="topnav">
    <a href="welcome_eml.html"><b>Logout</b></a>
  </div>
  <body>
    <div class="transbox">
<div class="text text-center">
  <h1>Available Courses</h1>
<?php
// ECHO $_POST['name'];
require_once('server0.php');
 $connect = new PDO('mysql:host=localhost;dbname=learningsystem','root', 'root');
 if(isset($_POST['s_login'])){
  $select_courses = "SELECT distinct `c_name` FROM `user`";
  $stquery = $conn->query($select_courses);
   if ($stquery->num_rows > 0) {
   while($row = $stquery->fetch_assoc()) {
     echo "<a href=select_courses.php?c_name=".$row["c_name"].">".$row["c_name"]."</a><br>";
   }
 }
 }
?>
</div>
</div>
</body>
</html>
