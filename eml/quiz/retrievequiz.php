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
    <title>quiz</title>
    <meta chartset="utf-8"/>
    <style>
    body{
      background-image: url("bg.jpg");
    }
    </style>
  </head>
  <div class="topnav">
    <a href="../welcome_eml.html"><b>Logout</b></a>
  </div>

  <body>
    <div class="transbox">
    <div class="text text-left">
    <?php
    require_once('server0.php');
    if (mysqli_connect_errno())
    {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    if(isset($_GET['unit'])){
      $unit = $_GET['unit'];
    }

   echo "<form action='calculatequiz.php' method='post'>";

  $sqlu = "SELECT distinct `name` FROM `quiz` where `name`='$unit'";
  $resultu = $conn->query($sqlu);

    if ($resultu->num_rows > 0) {
     while($row = $resultu->fetch_assoc()) {
        $unit=$row["name"];
        $sqlq = "SELECT distinct `ques` FROM `quiz` where `name`='$unit'";
        $resultq = $conn->query($sqlq);
        if ($resultq->num_rows > 0) {
         while($row = $resultq->fetch_assoc()) {
           echo "<p>" . $row["ques"]. "</p>";
           $q=$row["ques"];
           $sqlopt = "SELECT `opt` FROM `quiz` where `ques`='$q'";
           $resultopt = $conn->query($sqlopt);
           if ($resultopt->num_rows > 0) {
            while($row = $resultopt->fetch_assoc()) {
              echo "<input type='radio' name='optradio[<?php echo $q; ?>]' value=".$row["opt"]." required>" . $row["opt"]. "</input></br>";
            }
           } else {
             echo "0 results";
           }
         }
        } else {
          echo "0 results";
        }
     }
     echo "<p></p>";
     echo "<input type='submit' name='calc' value='Submit'>";
     echo "</form>";
    } else {
      echo "No Quiz added - 0 results";
    }


     ?>
   </div>
 </div>
  </body>
</html>
