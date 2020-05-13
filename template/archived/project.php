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
  <h2>Config</h2>
  <p>Links per project or add a new project below.</p>
   
<?php
include 'mysql.php';
$link = mysqli_connect("localhost", $MUSER, $MPASS, $MDB1);

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "SELECT * FROM projects ORDER BY id ASC";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
	echo "<b>Project:</b> " . $row["project"] . "<br>";
        echo "   - <a href=addquestion.php?idurl=" . $row["id"] . ">Add Question</a><br>";
        echo "   - <a href=quiz.php?idurl=" . $row["id"] . ">Quiz</a><br>";
        echo "   - <a href=rquiz.php?idurl=" . $row["id"] . ">Random Quiz</a><br>";
        echo "   - <a href=listall.php?idurl=" . $row["id"] . ">List All</a><br>";
        echo "   - <a href=report.php?idurl=" . $row["id"] . ">Report</a><br><br>";
    }
} else {
    echo "0 results";
}
mysqli_close($link);
?>

<form action="project_process.php">
 <br><label for="project">Project Name:</label><br>
 <input type="text" id="exam" name="project" size="30" value=""><br>
 <input type="submit" value="Submit">
</form>

</div>

</body>
</html> 

