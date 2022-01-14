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
  <title>Bookmarks</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="styling.css">
  <?php include('server.php');
    if(isset($_GET['id'])){
    $id = $_GET['id'];
    setcookie("cookie",$id);
  }
  ?>
  <style>
  body{
    background-image: url("bg.jpg");
  }
  </style>
</head>

<div class="topnav">
  <img src="logo.png" alt="logo" style="width:50px;height:50px;position:absolute; left:7px;">
  <a href="#" style="padding-left: 4.5em; font-family: 'Jazz LET', fantasy; font-size: 130%"><b><b><i>MarkMyPage</i></b></b></a>
  <a href="" style="padding-left: 55.8em"></a>
  <a href="../homepage.html"><b>Home</b></a>
  <a  href="login.html" style=""><b>Logout</b></a>
</div>


<body class="bg">

  <form class="header3" action="performoperation.php" method="post">
    <div class="transbox_b">
    <div class="text text-left">
    <h4>Add a bookmark</h4>
    <h6>If you want to modify title, enter the url with the new title <br> If you want to modify the url
    enter the title with the new url</h6>
    <p>Title:
    <input type="text" name="title" size="30" required/>
    </p>
    <p>Url:
    <input type="text" name="url" size="100" required/>
    </p>
    <p>
    <input type="submit" name="submit" value="Add" />
    <input type="submit" name="delete" value="Delete" />
    <input type="submit" name="nmodify" value="Modify Name" />
    <input type="submit" name="umodify" value="Modify url" />
    </p>




  <?php
  include('server.php');
  if(isset($_GET['id'])){
         $id = $_GET['id'];
  }

  $sql = "SELECT * FROM bookmarks where id=$id";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    echo "<h2>Your bookmarks</h2>";
      while($row = $result->fetch_assoc()) {
          echo "<li><b>φ.</b> Title: " . $row["Title"]. " || Url: <a href='".$row["url"]."' target='_blank'>".$row["url"]."</a></li>";
      }
    } else {
      echo "You haven't added any bookmarks yet!";
  }
  ?>
</div>
</div>
</form>

</body>
</html>
