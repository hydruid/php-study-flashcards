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
 <form action="addquestion_process.php">
  <label for="question">Question:</label><br>
  <input type="textbox" id="question" name="question" size="200"><br><br><br>
  <label for="answer1">Answer1:</label><br>
  <input type="text" id="answer1" name="answer1" size="200"><br><br>
  <label for="answer2">Answer2:</label><br>
  <input type="text" id="answer2" name="answer2" size="200"><br><br>
  <label for="answer3">Answer3:</label><br>
  <input type="text" id="answer3" name="answer3" size="200"><br><br>
  <label for="answer4">Answer4:</label><br>
  <input type="text" id="answer4" name="answer4" size="200"><br><br><br>
  <label for="correct">Correct:</label><br>
  <input type="text" id="correct" name="correct" size="200"><br><br>
  <input type="submit" value="Submit">
</form> 
</div>
   
</body>
</html> 

