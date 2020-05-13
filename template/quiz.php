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
  <p>Good Luck</p>

<form method="post" action="quiz_process.php">

<?php
$IDURL="$_GET[idurl]";
#$IDURL=rand(1,96);
include 'mysql.php';
$link = mysqli_connect("localhost", $MUSER, $MPASS, $MDB1);

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
$sql = "SELECT * FROM questions WHERE id=$IDURL";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        #echo "ID: " . $row["id"] . ",   Exam: " . $row["exam"] . "<br>" . $row["question"] . "<br><br><br><br>";
 	#echo '<label for=exam>Exam:</label><br>';
        #echo "<input type=text id=exam name=exam size=30 value=" . $row[exam] . "><br><br>";
        #Random Order of Questions
        $order=rand(1,3);
        if ($order == "1") {
	echo "<b>" . $row[id] . ":  " . $row[question] . "</b><br><br>";
        echo '<input type=checkbox id=answer name=answer value="' . $row[answer1] . '">';
        echo '<label for=answer1>' . $row[answer1] . '</label><br>';
        echo '<input type=checkbox id=answer name=answer value="' . $row[answer2] . '">';
        echo '<label for=answer2>' . $row[answer2] . '</label><br>';
        echo '<input type=checkbox id=answer name=answer value="' . $row[answer3] . '">';
        echo '<label for=answer3>' . $row[answer3] . '</label><br>';
        echo '<input type=checkbox id=answer name=answer value="' . $row[answer4] . '">';
        echo '<label for=answer4>' . $row[answer4] . '</label><br>';
        echo '<input type=hidden id=id name=id value="' . $row[id] . '">';
        echo '<input type=hidden id=correct name=correct value="' . $row[correct] . '">';
        } elseif ($order == "2") {
        echo "<b>" . $row[id] . ":  " . $row[question] . "</b><br><br>";
        echo '<input type=checkbox id=answer name=answer value="' . $row[answer4] . '">';
        echo '<label for=answer1>' . $row[answer4] . '</label><br>';
        echo '<input type=checkbox id=answer name=answer value="' . $row[answer1] . '">';
        echo '<label for=answer2>' . $row[answer1] . '</label><br>';
        echo '<input type=checkbox id=answer name=answer value="' . $row[answer2] . '">';
        echo '<label for=answer3>' . $row[answer2] . '</label><br>';
        echo '<input type=checkbox id=answer name=answer value="' . $row[answer3] . '">';
        echo '<label for=answer4>' . $row[answer3] . '</label><br>';
        echo '<input type=hidden id=id name=id value="' . $row[id] . '">';
        echo '<input type=hidden id=correct name=correct value="' . $row[correct] . '">';
        } elseif ($order == "3") {
        echo "<b>" . $row[id] . ":  " . $row[question] . "</b><br><br>";
        echo '<input type=checkbox id=answer name=answer value="' . $row[answer2] . '">';
        echo '<label for=answer1>' . $row[answer2] . '</label><br>';
        echo '<input type=checkbox id=answer name=answer value="' . $row[answer3] . '">';
        echo '<label for=answer2>' . $row[answer3] . '</label><br>';
        echo '<input type=checkbox id=answer name=answer value="' . $row[answer4] . '">';
        echo '<label for=answer3>' . $row[answer4] . '</label><br>';
        echo '<input type=checkbox id=answer name=answer value="' . $row[answer1] . '">';
        echo '<label for=answer4>' . $row[answer1] . '</label><br>';
        echo '<input type=hidden id=id name=id value="' . $row[id] . '">';
        echo '<input type=hidden id=correct name=correct value="' . $row[correct] . '">';
        } else {
            echo "<b>NO MATCH ORDER</b>";
        }


    }
} else {
    echo "0 results";
} 

echo '<input type="submit" value="Submit"><br><br><br>';
echo  "<img src=./images/$IDURL.jpg>";
echo  "<img src=./images/$IDURL-2.jpg>";
echo  "<img src=./images/$IDURL-3.jpg>";
echo  "<img src=./images/$IDURL-4.jpg>";
echo  "<img src=./images/$IDURL-5.jpg>";
?>

</form>
</div>

<?php
// Close connection
mysqli_close($link);
?>
   
</body>
</html> 

