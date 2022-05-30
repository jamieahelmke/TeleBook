<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
  <p class="header">Telefonbuch</p>

  <div class="center">
    <button onclick="location.href = './edit.php';">Einträge bearbeiten...</button>
  </div>

  <br><br>
  <p id="text1">Tabelle:</p>
  
  <?php
    include "src-backend/read.php";
    get_entire_table();
  ?>
</body>
</html>