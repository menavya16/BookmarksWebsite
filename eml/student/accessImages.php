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
    <title>Images</title>
    <meta charset="utf-8"/>
    <style>


    <style type="text/css">
    #content{
    	width: 50%;
    	margin: 20px auto;
    	border: 1px solid #cbcbcb;
    }
    #img_div{
    	width: 80%;
    	padding: 5px;
    	margin: 15px auto;
    	border: 1px solid #cbcbcb;
    }
    #img_div:after{
    	content: "";
    	display: block;
    	clear: both;
    }
    img{
    	float: left;
    	margin: 5px;
    	width: 300px;
    	height: 140px;
    }
    </style>
  </head>
  <div class="topnav">
    <a href="../welcome_eml.html"><b>Login</b></a>
  </div>
  <body>
    <div id="content">
  <?php
  include('server0.php');
  $result = mysqli_query($conn, "SELECT * FROM image_upload");
  while ($row = mysqli_fetch_array($result)) {
    echo "<div id='img_div'>";
    echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['image'] ).'"/>';
    //  echo "<img src='../Images/image_upload/".$row['image']."' >";
      echo "<p>".$row['image_text']."</p>";
    echo "</div>";
  }
  ?>
</div>
</body>
</html>
