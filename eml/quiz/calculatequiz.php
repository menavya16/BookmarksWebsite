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
  <title>Calculate Quiz Mark</title>
  <meta charset="utf=8"/>
  <style>
  body{
    background-image: url("bg.jpg");
  }
  </style>
</head>

<?php
require_once('server0.php');
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sqla = "SELECT distinct `ans` FROM `quiz`";
$resulta = $conn->query($sqla);
$score=0;

if(isset($_POST["calc"])){
  echo "okay";
  $options=$_POST['optradio'];
  $selectedOptions=array();
  $answers=array();
  if ($resulta->num_rows > 0) {
   while($row = $resulta->fetch_assoc()) {
     array_push($answers,$row["ans"]);

   }
 }
  foreach($_POST['optradio'] as $option_num => $option_val){
    array_push($selectedOptions,$option_val);
  }
  for($i=0;$i<sizeof($answers);$i++){
    if($selectedOptions[$i]==$answers[$i]){
      $score++;
    }
  }
  echo "The final score is: ".$score."/".sizeof($selectedOptions);
}
 ?>

</body>
</html>
