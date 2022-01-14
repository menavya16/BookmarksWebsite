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
  <meta charset="utf-8"/>
  <style>
  body{
    background-image: url("bg.jpg");
  }
  </style>
</head>

<div class="topnav">
  <a href="main.html"><b>Home</b></a>
  <a  href="login.html"><b>Logout</b></a>
</div>

<body>
  <?php
  include('server.php');
  $connect = new PDO('mysql:host=localhost;dbname=users','root', 'root');
  $title=$_POST["title"];
  echo "This is the title ----".$title;
  $url=$_POST["url"];
  if(isset($_COOKIE["cookie"])){
      echo "Cookie is set ".$_COOKIE["cookie"];
      $id=$_COOKIE["cookie"];
  }

  if (filter_var($url, FILTER_VALIDATE_URL)) {
  if(isset($_POST['submit'])){
    $insert = "insert into bookmarks (Title, url, id) VALUES (:Title, :url, :id);";
    $i_exec = $connect->prepare($insert);
      $i_exec->bindParam(':id', $id);
      echo "This is the id ".$id;
      $i_exec->bindParam(':Title', $title);
      echo "This is title ".$title;
      $i_exec->bindParam(':url', $url);
    //  echo "This is url ".$url;
      $i_exec->execute();
      echo "<script>location.href='bookmarks.php?id=".$id."'</script>";
  }else if(isset($_POST['delete'])){
    $sql = "delete from bookmarks where title='$title' AND url='$url'";
    if (mysqli_query($conn, $sql)) {
      echo "Record deleted";
      echo "<script>location.href='bookmarks.php?id=".$id."'</script>";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
      echo  "Jesus";
  }else if(isset($_POST['nmodify'])){
    $sql = "Update bookmarks set title='$title' where url='$url'";
    if (mysqli_query($conn, $sql)) {
      echo "Record Updated";
      echo "<script>location.href='bookmarks.php?id=".$id."'</script>";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
      echo  "Jesus";
  }else if(isset($_POST['umodify'])){
    $sql = "Update bookmarks set url='$url' where title='$title'";
    if (mysqli_query($conn, $sql)) {
      echo "Record Updated";
      echo "<script>location.href='bookmarks.php?id=".$id."'</script>";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
      echo  "Jesus";
  }
 } else {
     echo "<script>alert('Invalid Url');location.href='bookmarks.php?id=".$id."'</script>";

}
   ?>

</body>

</html>
