<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link href="../style.css?v={random number/string}" type="text/css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
<title>Add User</title>
<style>
body{
  background-image: url("bg.jpg");
}
</style>
</head>
<body>
<?php

require_once('server.php');

$fname = $_POST["first_name"];
$lname = $_POST["last_name"];
$pswd = $_POST["password"];
echo $fname;


  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


  if(isset($_POST['submit'])){
        $email = test_input($_POST["email"]);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          echo "<script>alert('Invalid Email format');location.href='newuser.html';  </script>";
        }else{

    $sql = "insert into usersinfo (FirstName, LastName, Email, Password) VALUES ('$fname', '$lname', '$email', '$pswd')";

    if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";

      // select id and insert bookmarks here
      $id = "SELECT `id` FROM usersinfo where `Email`='$email'";
      $result = $conn->query($id);
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              $id=$row["id"];
              echo "this is id ".$id;
              // i have to insert top10 websites with this id into the system
              $connect = new PDO('mysql:host=localhost;dbname=users','root', 'root');
              $insert = "insert into bookmarks (Title, url, id) VALUES (:Title, :url, :id);";
              $i_exec = $connect->prepare($insert);
              $names = array("Google", "Facebook", "Athabasca", "w3schools", "Twitter", "Amazon", "Ebay", "Hotmail", "Reddit", "News");
              $websites= array("https://www.google.com/", "https://www.facebook.com/", "https://www.athabascau.ca/",
              "https://www.w3schools.com/", "https://twitter.com/", "https://www.amazon.ca/", "https://www.ebay.ca/",
              "https://outlook.live.com/owa/", "https://www.reddit.com/", "https://news.google.com/?hl=en-CA&gl=CA&ceid=CA:en"
              );
              $count = count($names);
              for($i=0;$i<$count; $i++){
                $i_exec->bindParam(':id', $id);
              //  echo $id;
                $i_exec->bindParam(':Title', $names[$i]);
              //  echo $names[$i];
                $i_exec->bindParam(':url', $websites[$i]);
              //  echo $name;
                $i_exec->execute();
              }
                echo "<script>location.href='bookmarks.php?id=".$id."'</script>";
          }
        } else {
          echo "Error";
      }

    echo "<script>location.href='login.html'</script>";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }


  }


?>


</body>
</html>
