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
  <title>Add new Unit</title>
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
<?php
session_start();
require_once('server0.php');
$name=$_POST["name"];
$password=$_POST["password"];
//var_dump($password);
$code=$_POST["code"];
$connect = new PDO('mysql:host=localhost;dbname=learningsystem','root', 'root');
setcookie("n_add", $name);
setcookie("p_add", $password);
setcookie("c_add", $code);
//var_dump($_COOKIE['p_add']);

if(isset($_POST["submit"]) || isset($_REQUEST['id'])){
  if($code==004 || isset($_REQUEST['id'])){
    $course=$_POST["course"];
    echo "<h2>Welcome to ".$course."</h2></br></br>";

    //display the courses already being taught by the teacher
    echo "Your dashboard is empty...</br>";
    $insertcourse = "insert into user (code, name, pswd, c_name) values (:code, :name, :pswd, :c_name);";
    $stmtquery = $connect->prepare($insertcourse);
    $stmtquery->bindParam(':code', $code);
    $stmtquery->bindParam(':name', $name);
    $stmtquery->bindParam(':pswd', $password);
    $stmtquery->bindParam(':c_name', $course);
    $stmtquery->execute();
    echo "<a href=unit_reg.php?course=".$course.">+New Unit</a>";

  }else{
        echo "The code you have entered is incorrect</br>";
        echo "<a href='welcome_eml.html'>Go back</a>";
      }
}else if(isset($_POST['submit_login'])){
  // check the password here
  $checkpswd = "SELECT distinct `pswd` FROM `user` where `name`='$name'";
  $squery = $conn->query($checkpswd);
  if ($squery->num_rows > 0) {
  while($row = $squery->fetch_assoc()) {
      $pswd= $row["pswd"];
    }
  }
  if($pswd==$password){
  if($code==004){
  echo "</br><h3>Courses taught by you...</h3>";

   $select_courses = "SELECT distinct `c_name` FROM `user` where `name`='$name'";
   $stquery = $conn->query($select_courses);
    if ($stquery->num_rows > 0) {
    while($row = $stquery->fetch_assoc()) {
      echo "<a href=select_courses.php?c_name=".$row["c_name"].">".$row["c_name"]."</a><br>";
    }
  }
  echo "<form action='t_interface.php' method='POST'>";
  echo "<h6>Add another course? Press enter to submit</h6>";
  echo "Course name: <input type='textbox' name='sub'>";
  echo "</form>";
  }
  else{
        echo "The code you have entered is incorrect</br>";
        echo "<a href='welcome_eml.html'>Go back</a>";
      }
    }else{
      echo "Entered the wrong username/password";
      echo "<a href='welcome_eml.html'>Go back</a>";

    }

}else if(isset($_POST['sub'])){
    $course=$_POST['sub'];
    if(isset($_COOKIE['n_add'])){
      $name = $_COOKIE['n_add'];
      $code = $_COOKIE['c_add'];
      $password = $_COOKIE['p_add'];
    }else{
      echo "cookie is not set";
    }

    $insertcourse = "insert into user (code, name, pswd, c_name) values (:code, :name, :pswd, :c_name);";
    $stmtquery = $connect->prepare($insertcourse);
    $stmtquery->bindParam(':code', $code);
    $stmtquery->bindParam(':name', $name);
    $stmtquery->bindParam(':pswd', $password);
    $stmtquery->bindParam(':c_name', $course);
    $stmtquery->execute();
    echo "<a href=unit_reg.php?course=".$course.">+New Unit</a>";
}

?>
</body>
</html>
