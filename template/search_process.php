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
 
$question = mysqli_real_escape_string($link, $_REQUEST['question']);
 
$sql = "SELECT * FROM questions WHERE question like '%$question%'";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . ",   Exam: " . $row["exam"] . "<br>" . $row["question"] . "<br><br>";
    }
} else {
    echo "0 results";
}
mysqli_close($link);
?>

</div>
   
</body>
</html> 

