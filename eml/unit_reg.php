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
  if(isset($_GET['course'])){
      $course = $_GET['course'];
      echo "</br><a href='javascript://' onclick='history.back();'>Add another unit</a>";
      setcookie("coursename", $course);
      echo "<h1>Course name: ".$course."</h1>";
  }
  echo "<a href='t_interface.php?id=1'>Course</a>"."<a href='unit_reg.php' class='button'>>Unit</a>"."<a href='chapter.php' class='button'>>Lesson</a>";
  ?>

<form action="addunit.php" method="post">
<br>Unit Name: <textarea type="text" name="unit" rows="2" cols="100"><unitname></unitname></textarea></br></br>
Description: <textarea type="text" rows="4" cols="50" name="desc"><desc></desc></textarea><br></br>
Chapter Name: <textarea type="text" name="chpt" rows="2" cols="100" required><chaptername></chaptername></textarea><br></br>
<input type="submit" name="submit_unit" value="Submit" class="btn btn-outline-secondary btn-lg">

</form>
</div>
</body>
</html>
