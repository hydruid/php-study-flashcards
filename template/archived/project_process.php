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
  <p>Project added.</p>
</div>
   
<div class="main">
  <br><br><br>
  <p>New Project:</p>

<?php
include 'mysql.php';
$link = mysqli_connect("localhost", $MUSER, $MPASS, $MDB1);

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$project = mysqli_real_escape_string($link, $_REQUEST['project']);

$sql = "INSERT INTO projects (project, var1, var2) VALUES ('$project', '', '')";
if(mysqli_query($link, $sql)){
    echo "";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

$sql = "SELECT * FROM projects ORDER BY id DESC";
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

</div>

</body>
</html> 

