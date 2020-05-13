<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>

<body>

<div class="sidenav">
  <?php include "sidenav.html" ?>
</div>

<div class="main">
  <h2>Add Question</h2> 
  <p>Question Submitted</p>

<?php
include 'mysql.php';
$link = mysqli_connect("localhost", $MUSER, $MPASS, $MDB1);
 
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
$project = mysqli_real_escape_string($link, $_REQUEST['project']);
$question = mysqli_real_escape_string($link, $_REQUEST['question']);
$answer1 = mysqli_real_escape_string($link, $_REQUEST['answer1']);
$answer2 = mysqli_real_escape_string($link, $_REQUEST['answer2']);
$answer3 = mysqli_real_escape_string($link, $_REQUEST['answer3']);
$answer4 = mysqli_real_escape_string($link, $_REQUEST['answer4']);
$correct = mysqli_real_escape_string($link, $_REQUEST['correct']);
 
$sql = "INSERT INTO questions (project, question, answer1, answer2, answer3, answer4, correct) VALUES ('$project', '$question', '$answer1', '$answer2', '$answer3', '$answer4', '$correct')";
if(mysqli_query($link, $sql)){
    echo "Question added successfully.<br><br>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

$sql = "SELECT * FROM questions ORDER BY id DESC LIMIT 1";
$result = $link->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<br><br><a href=quiz.php?idurl=" . $row["id"] . ">ID: " . $row["id"] . "</a>,   Exam: " . $row["exam"] . "<br>" . $row["question"] . "<br><br>";
    }
} else {
    echo "0 results";
}
mysqli_close($link);
?>

</div>
   
</body>
</html> 

