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
  <h2>Search Questions</h2>
 <form action="search_process.php">
  <label for="question">Question:</label><br>
  <input type="textbox" id="question" name="question" size="200"><br><br>
  <input type="submit" value="Submit">
</form> 
</div>
   
</body>
</html> 

