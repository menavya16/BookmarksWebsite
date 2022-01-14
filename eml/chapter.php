<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link href="../style.css?v={random number/string}" type="text/css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
  <title>Chapter</title>
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
  echo "<a href='t_interface.php?id=1'>Course</a>"."<a href='unit_reg.php' class='button'>>Unit</a>"."<a href='chapter.php' class='button'>>Chapter</a>";

  if(isset($_GET['course'])){
      $course = $_GET['course'];
      $unit = $_GET['unit'];
      $chapter = $_GET['chapter'];
      echo "<h1> Course: ".$course."</h1>";
      echo "<h2> Unit: ".$unit."</h2>";
      echo "<h3> Chapter: ".$chapter."</h3>";
      setcookie("coursename", $course);
      setcookie("unitname", $unit);
      setcookie("chaptername", $chapter);
  }



  ?>

<form action="newlesson.php" method="post">
Topic Name: <textarea type="text" name="topicname" rows="2" cols="100"><topicname></topicname></textarea><br></br>
Paragraphs: <textarea type="text" rows="4" cols="50" name="para"><par></par></textarea><br></br>
<input type="submit" name="submit" value="Submit" class="btn btn-outline-secondary btn-lg"><br>
</form>
</div>
</body>
</html>
