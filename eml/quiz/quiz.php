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
  <title>Quiz</title>
  <meta charset="utf-8"/>
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
  <div class="text text-center">
  <form action="addaquiz.php" method="post">
  Unit:<textarea type="text" name="unit" rows="2" cols="100" required><unit></unit></textarea><br />
  Quiz Question:<textarea type="text" name="ques" rows="2" cols="100" required><ques></ques></textarea><br />
  Options:<textarea type="text" rows="4" cols="50" name="opt" required><opt></opt></textarea><br />
  Answer: <textarea type="text" name="ans" rows="2" cols="100" required><ans></ans></textarea><br />
  <input type="submit" name="quiz" value="Submit">
  </form>
</div>
</div>
</body>
</html>
