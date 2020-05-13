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
  <h2>Quiz</h2> 
  <p>Question Review</p>

<?php
include 'mysql.php';
$link = mysqli_connect("localhost", $MUSER, $MPASS, $MDB1);

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
$answer = mysqli_real_escape_string($link, $_REQUEST['answer']);
$questionid = mysqli_real_escape_string($link, $_REQUEST['id']);
$correct = mysqli_real_escape_string($link, $_REQUEST['correct']);
$hide = mysqli_real_escape_string($link, $_REQUEST['hide']);

if ($answer == $correct) {
    $status="true";
} else {
    $status="false";
}

$sql = "INSERT INTO quiz (questionid, answer, correct, status) VALUES ('$questionid', '$answer', '$correct', '$status')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.<br><br>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link);
?>

<?php
include 'mysql.php';
$HIDE="$_GET[hide]";
echo $hide;

$link = mysqli_connect("localhost", $MUSER, $MPASS, $MDB1);

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "SELECT * FROM quiz ORDER BY id DESC LIMIT 1";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Question ID: " . $row["questionid"] . "<br><br>";
        echo "Choice:  " . $row["answer"] . "<br><br>";
        if ($hide == "true") {
            echo "";
        } else {
            echo "Answer:  " . $row["correct"] . "<br><br>";
        }
	if ($status == "true") {
	    echo "Correct Answer";
	} else {
	    echo "<b>WRONG</b>";
	}
        #Next Question in Order
	echo "<br><br>";
        $nextid=$row["questionid"]+1;
        if ($hide == "true") {
            echo "<a href=hquiz.php?idurl=" . $nextid . ">Next Question</a>";
        } else {
            echo "<a href=quiz.php?idurl=" . $nextid . ">Next Question</a>";
        }
    }
} else {
    echo "0 results";
}
mysqli_close($link);
?>

</div>
   
</body>
</html> 

