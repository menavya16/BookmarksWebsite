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
    <title>Login Info</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styling.css">
    <style>
    body{
      background-image: url("bg.jpg");
    }
    </style>
  </head>

  <body class="bg">
    <div class="header3">
      <h3><p>Bookmarks</p></h3></p>

    <?php
    require_once('server.php');

    $email = $_POST["email"];
    $pswd = $_POST["password"];
    echo $email;

    if(isset($_POST['submit'])){
      $sql = "SELECT `Password` FROM `usersinfo` where `Email`='$email'";
      $exec = $conn->query($sql);
      if ($exec->num_rows > 0) {
      while($row = $exec->fetch_assoc()) {
          $pass=$row["Password"];
        }
      }else{
        echo "Wrong username";
      }

      if($pass==$pswd){
        $select_id="SELECT `id` FROM `usersinfo` where `Email`='$email' AND `Password`='$pswd'";
        $idexec = $conn->query($select_id);
        if($idexec->num_rows>0){
          while($row1=$idexec->fetch_assoc()){
              $id=$row1["id"];
              echo "<script>location.href='bookmarks.php?id=".$id."'</script>";
          }
        }
      }else{
        echo "Wrong password";
      }
    }
    ?>


</div>
  </body>
</html>
