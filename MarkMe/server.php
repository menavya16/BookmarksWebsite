<?php

  $user = 'root';
  $password = 'root';
  $db = 'users';
  $host = 'localhost';
  $port = 8889;

  $conn = new mysqli($host, $user, $password, $db);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


  mysqli_close($link);

 ?>
