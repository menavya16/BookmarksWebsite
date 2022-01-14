<?php

//diaply units here with the quizzes

if(isset($_GET['c_name'])){
    $course = $_GET['c_name'];
    print($course);
  //  npw i have the course name, i dhould print out the units now using the course
    $unit = "SELECT distinct `name` from `units` where `c_name`='$course'";
    $ex=$conn->query($unit);
    if($ex->num_rows>0){
      echo "<h3>Units: </h3>";
      while($row=$ex->fetch_assoc()){
          echo $row["name"];
      }
    }
}


 ?>
