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
    <title>Login</title>
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
<!--actually i am not sure yet which php file I should link-->
  <body>
  <form class="header3" action="courses.php" method="post">
 <div class="transbox">
  <div class="text text-center">
    <h3>Login</h3>
    <label>Student Code (*)&nbsp;</label><input type="text" name="code"  required></br>
    <label>Name</label>&nbsp;<input type="text" name="name"  required></br>
    <label>Password</label>&nbsp;<input type="password" name="password"  required></br>
    <input type="submit" name="s_login" value="Submit" class="btn btn-outline-secondary btn-lg"></br>
    Not a user?<a href="s_reg.html">Register</a>
  </div>
</div>
  </form>

  </body>
</html>
