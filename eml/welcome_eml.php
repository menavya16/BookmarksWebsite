<!DOCTYPE html>
<html>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="../style.css?v={random number/string}" type="text/css" rel="stylesheet">
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
    <a href="../homepage.html"><b>Home</b></a>
  </div>
  <body>
<?php
echo "okay";
require_once('server0.php');

  if(isset($_POST["teacher"])){
    echo "<script> location.href='t_reg.html'; </script>";

  }else if(isset($_POST["student"])){
    echo "<script> location.href='student/s_reg.html'; </script>";
  }
?>

</body>
