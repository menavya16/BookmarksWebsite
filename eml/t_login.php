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
  <form class="header3" action="t_interface.php" method="post">
    <div class="transbox">
  <div class="text text-left">
    <b><h2>Login</h2></b></br>
    <label>Secret Code (*)&nbsp;</label><input type="text" name="code" style="width: 50px;" required></br>
    <label>Email&nbsp;</label><input type="text" name="name" required></br>
    <label>Password&nbsp;</label><input type="password" name="password"required></br>
    <div class="text text-center"><br>
    <input type="submit" name="submit_login" value="Submit" class="btn btn-outline-secondary btn-lg"></br>
    Not a user?<a href="t_reg.html">Register</a>
    </div>
  </div>
  </div>
  </form>

  </body>
</html>
