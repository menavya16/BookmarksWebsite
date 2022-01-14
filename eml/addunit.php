<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link href="../style.css?v={random number/string}" type="text/css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
  <title>Unit</title>
  <meta charset="utf-8">
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
    <div class='text text-center'>
<?php

  echo "<a href='t_interface.php?id=1'>Course</a>"."<a href='unit_reg.php' class='button'>>Unit</a>";
  $unit=$_POST["unit"];
  $description=$_POST["desc"];
  $chapter=$_POST["chpt"];


  if(isset($_COOKIE["coursename"])) {
      $course=$_COOKIE["coursename"];
      echo "<h1>".$course."</h1>";
  }


 $connect = new PDO('mysql:host=localhost;dbname=learningsystem','root', 'root');
  $sql="insert into units (c_name,name,chapter, description) values (:c_name,:unit,:chpt, :desc);";
  $stmtquery = $connect->prepare($sql);

  if(isset($_POST['submit_unit'])){
    $stmtquery->bindParam(':c_name', $course);

  $u_pattern = '/<unit.*?>(.+?)<\/unit.*?>/';
  preg_match_all($u_pattern, $unit, $u_match);
  $u_out = preg_replace('/\s+/', ' ', $u_match[0][0]);
  $u_out = preg_replace("/<.*?>/", "", $u_out);
  //print_r("This is the unit ".$u_out);
  $stmtquery->bindParam(':unit', $u_out);

  $c_pattern = '/<chapter.*?>(.+?)<\/chapter.*?>/';
  preg_match_all($c_pattern, $chapter, $c_match);
  $c_out = preg_replace('/\s+/', ' ', $c_match[0][0]);
  $c_out = preg_replace("/<.*?>/", "", $c_out);
//  print_r("This is the chapter in the unit ".$c_out);
  $stmtquery->bindParam(':chpt', $c_out);

  $d_pattern = '/<desc.*?>(.+?)<\/desc.*?>/';
  preg_match_all($d_pattern, $description, $d_match);
  $d_out = preg_replace('/\s+/', ' ', $d_match[0][0]);
  $d_out = preg_replace("/<.*?>/", "", $d_out);
//  print_r("This is the description of the unit ".$d_out);
  $stmtquery->bindParam(':desc', $d_out);

  $stmtquery->execute();

  echo "<br>Congratulations! Course has been added!<br>";
  echo "<a href='chapter.php?course=".$course."&unit=".$u_out."&chapter=".$c_out."' class='button'>Add new lesson within unit?</a>";


  }
 ?>

</div>
</body>
</html>
