<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>

<body>

<?php
include 'mysql.php';
$link = mysqli_connect("localhost", $MUSER, $MPASS, $MDB1);

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
$sql = "SELECT * FROM notes WHERE note NOT LIKE '<img%'";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo $row["note"] . "<br><br>";
    }
} else {
    echo "0 results";
} 

$sql = "SELECT * FROM notes WHERE note LIKE '<img%'";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo $row["note"] . "<br><br>";
    }
} else {
    echo "0 results";
}

mysqli_close($link);
?>

</div>
   
</body>
</html> 

