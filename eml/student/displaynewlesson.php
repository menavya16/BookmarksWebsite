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
  <body>

    <div class="topnav">
      <a href="../welcome_eml.html"><b>Logout</b></a>
    </div>

<div class="text text-center">
  <h1>Units</h1>

<?php
    require_once('../server0.php');
    if (mysqli_connect_errno())
    {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
      if(isset($_GET['u_name'])){
        $unit = $_GET['u_name'];
        print_r($unit);
      }

    $sqlc = "SELECT distinct `chapter` FROM `lesson` where `unit`='$unit'";
    $resultc = $conn->query($sqlc);

    if ($resultc->num_rows > 0) {
     while($row3 = $resultc->fetch_assoc()) {
         echo "<h1>" . $row3["chapter"]. "</h1>";
         $ch=$row3["chapter"];
         $sql = "SELECT distinct `topic` FROM `lesson` where `chapter`='$ch'";
         $result = $conn->query($sql);

         if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              echo "<h3>" . $row["topic"]. "</h3>";
              $tpic=$row["topic"];
              $sqlp = "SELECT `par` FROM `lesson` WHERE `topic`='$tpic'";
              $resultp = $conn->query($sqlp);

              if ($resultp->num_rows > 0) {
               while($row2 = $resultp->fetch_assoc()) {
                   echo "<p>" . $row2["par"]. "</p>";
               }
              } else {
                echo "</br>0 results";
              }
          }
         } else {
           echo "</br>0 results";
         }
     }
    } else {
      echo "</br>0 results";
    }

    // here we're going to have hyperlinks to the respective quizzes
    echo "<a href=../quiz/retrievequiz.php?unit=".$unit.">Quiz</a><br>";
    echo "<form>";
      echo "<br><a href='accessImages.php' class='button'>Access Images?</a>"
 ?>


</div>
</body>
</html>
