<?php
require_once('server0.php');
$connect = new PDO('mysql:host=localhost;dbname=learningsystem','root', 'root');

if(isset($_POST['submit'])){
    $topic = $_POST["topicname"];
    $paragraph = $_POST["para"];
    if(isset($_COOKIE["coursename"])) {
        $course=$_COOKIE["coursename"];
        $unit=$_COOKIE["unitname"];
        $chapter=$_COOKIE["chaptername"];
    }


        $query = "insert into lesson (course, unit, chapter,topic, par) values (:course, :unit, :chapter,:topic, :par);";
        $stmtquery = $connect->prepare($query);

        $stmtquery->bindParam(':course', $course);
        $stmtquery->bindParam(':unit', $unit);
        $stmtquery->bindParam(':chapter', $chapter);

        $patterntopic = '/<topic.*?>(.+?)<\/topic.*?>/';
        preg_match_all($patterntopic, $topic, $match, PREG_UNMATCHED_AS_NULL);
        $output_t = preg_replace('/\s+/', ' ', $match[0][0]);
        $output_t = preg_replace("/<.*?>/", "", $output_t);
        print_r("This is the topic ".$output_t);
        $stmtquery->bindParam(':topic', $output_t);



        $pattern = '/<par.*?>(.+?)<\/par.*?>/';
        $success=preg_match_all($pattern, $paragraph, $matches, PREG_UNMATCHED_AS_NULL);
        $length = sizeof($matches[0]);

          for($j=0;$j<$length;$j++){
            $paroutput = preg_replace('/\s+/', ' ', $matches[0][$j]);
            $paroutput = preg_replace("/<.*?>/", "", $paroutput);
            $stmtquery->bindParam(':par', $paroutput);
            $stmtquery->execute();
            }

          echo "<script> location.href='displaynewlesson.php?unit=".$unit."&chapter=".$chapter."'; </script>";
    }




?>
