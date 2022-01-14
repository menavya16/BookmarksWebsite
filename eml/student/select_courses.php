<!DOCTYPE html>
<html>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="../../style.css?v={random number/string}" type="text/css" rel="stylesheet">
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
  <h1>Units</h1>


<?php
include('../server0.php');
if(isset($_GET['c_name'])){
    $course = $_GET['c_name'];
  //  print_r("This is a course".$course);

    $unitname = "SELECT distinct `name` from `units` where `c_name`='$course'";
    $exec=$conn->query($unitname);

    if($exec->num_rows>0){
      while($row = $exec->fetch_assoc()){
        // this is sending it the unit name - but perhaps sending the chapter name would be better? actually nevrmrind
      echo "<br><a href=displaynewlesson.php?u_name=".$row["name"].">".$row["name"]."</a>";
        $unit=$row["name"];
        $desc = "SELECT distinct `description` from `units` where `name`='$unit'";
        $execute=$conn->query($desc);
        if($execute->num_rows>0){
          while($row1 = $execute->fetch_assoc()){
            echo "<br>".$row1["description"];
          }
        }
        echo "<br>";
      }
    }
}else if(isset($_POST['submit_login'])){
    // check for the username or password, if its wrong ask them to make a new account
    $user = $_POST["name"];
    $pswd = $_POST["password"];
  //  echo $user." ".$pswd;  ============================Sassdfg
    $username="SELECT distinct `name` from `user`";
    $exec=$conn->query($username);
    if($exec->num_rows>0){
      while($row = $exec->fetch_assoc()){
        $usern=$row["name"];
        if($usern==$user){
          $pass="SELECT distinct `pswd` from `user` where `name`='$usern'";
          $p_exec=$conn->query($pass);
          if($p_exec->num_rows>0){
            while($row2 = $p_exec->fetch_assoc()){
                echo "<br>".$row2["pswd"];
                $passw=$row2["pswd"];
                if($passw==$pswd){
                  // display all the courses
                  $all_courses = "SELECT distinct `c_name` from `units`";
                  // display all the courses and hyperlink it
                  $ex=$conn->query($all_courses);
                  if($ex->num_rows>0){
                    echo "<h3>Available Courses: </h3>";
                    while($row3=$ex->fetch_assoc()){
                    //  echo $row3["c_name"]."<br>";
                      // get unit in a different file and then send it over to display lesson
                      echo "<a href=getunit.php?c_name=".$row3["c_name"].">".$row3["c_name"]."</a><br>";
                    }
                  }

                /*  $ex=$conn->query($all_courses);
                  if($ex->num_rows>0){
                    while($row3 = $ex->fetch_assoc()){
                      echo "<br><a href=displaynewlesson.php?c_name=".$row3["c_name"].">".$row["c_name"]."</a>";
                        $unit=$row["name"];
                        $desc = "SELECT distinct `description` from `units` where `name`='$unit'";
                        $execute=$conn->query($desc);
                        if($execute->num_rows>0){
                          while($row1 = $execute->fetch_assoc()){
                            echo "<br>".$row1["description"];
                          }
                        }
                        echo "<br>";

                    }
                  }*/
                }else{
                  echo "Password is incorrect";
                }
            }
          }
        }
      }
    }

}
 ?>

</div>
</div>
</body>
</html>
