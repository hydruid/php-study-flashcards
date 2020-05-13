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
 <form action="addnote_process.php">
  <label for="note">Note:</label><br>
  <input type="textbox" id="note" name="note" size="200"><br><br><br>
  <input type="submit" value="Submit">
</form> 
</div>
   
</body>
</html> 

