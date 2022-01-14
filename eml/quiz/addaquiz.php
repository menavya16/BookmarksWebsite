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
  <div class="text text-left">
<?php
print_r("The quiz has been added!<br>");
$unit = $_POST["unit"];
echo "<a href=quiz.php?unit=".$unit.">Add another question?</a><br>";

if(isset($_POST["quiz"])){
  $ques = $_POST["ques"];
  $opt = $_POST["opt"];
  $ans = $_POST["ans"];
  $connect = new PDO('mysql:host=localhost;dbname=learningsystem','root', 'root');
  $insertquiz = "insert into quiz (name,ques, opt,ans) values (:name,:ques, :opt,:ans);";
  $stmtquery = $connect->prepare($insertquiz);

  $u_pattern = '/<unit.*?>(.+?)<\/unit.*?>/';
  preg_match_all($u_pattern, $unit, $u_match);
  $u_out= preg_replace('/\s+/', ' ', $u_match[0][0]);
  $u_out = preg_replace("/<.*?>/", "", $u_out);

  $q_pattern = '/<ques.*?>(.+?)<\/ques.*?>/';
  preg_match_all($q_pattern, $ques, $q_match);
  $q_out= preg_replace('/\s+/', ' ', $q_match[0][0]);
  $q_out = preg_replace("/<.*?>/", "", $q_out);

  $a_pattern = '/<ans.*?>(.+?)<\/ans.*?>/';
  preg_match_all($a_pattern, $ans, $a_match);
  $a_out= preg_replace('/\s+/', ' ', $a_match[0][0]);
  $a_out = preg_replace("/<.*?>/", "", $a_out);

  $o_pattern = '/<opt.*?>(.+?)<\/opt.*?>/';
  $success=preg_match_all($o_pattern, $opt, $o_matches);
  $length = sizeof($o_matches[0]);

  for($j=0;$j<$length;$j++){
    $paroutput = preg_replace('/\s+/', ' ', $o_matches[0][$j]);
    $paroutput = preg_replace("/<.*?>/", "", $paroutput);
    $stmtquery->bindParam(':name', $u_out);
    $stmtquery->bindParam(':ques', $q_out);
    $stmtquery->bindParam(':opt', $paroutput);
    $stmtquery->bindParam(':ans', $a_out);
    $stmtquery->execute();
  }
}
?>
</div>
</div>
</body>
</html>
