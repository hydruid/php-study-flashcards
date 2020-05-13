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
  <h2>Add Note</h2> 
  <p>Note Submitted</p>

<?php
include 'mysql.php';
$link = mysqli_connect("localhost", $MUSER, $MPASS, $MDB1);
 
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
$note = mysqli_real_escape_string($link, $_REQUEST['note']);
 
$sql = "INSERT INTO notes (note) VALUES ('$note')";
if(mysqli_query($link, $sql)){
    echo "Note added successfully.<br><br>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link);
?>

</div>
   
</body>
</html> 

