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
  <h2>Report</h2> 
  <p><a href=clearreport.php>Clear Report</a></p>

<?php
include 'mysql.php';
$link = mysqli_connect("localhost", $MUSER, $MPASS, $MDB1);

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
$sql = "SELECT * FROM quiz WHERE status='false'";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<a href=quiz.php?idurl=" . $row[questionid] . " target=_blank>Question ID: " . $row[questionid] . "<br></a>";
    }
} else {
    echo "0 results";
} 
mysqli_close($link);
?>

</div>
   
</body>
</html> 

