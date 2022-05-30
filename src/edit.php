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
  <p class="edit_mode center">[ EDIT MODE ]</p>

  <div class="center">
    <button onclick="location.href = './index.php';">EDIT MODE verlassen</button>
  </div>
  <br>

  <table class="center table">
    <tr>
      <th>Eintrag...</th>
      
    </tr>
    <tr>
      <td>
       <form action="src-backend/write.php" method="post">
        <select name="action" id="action">
          <option value="add">hinzufügen</option>
          <option value="edit">ändern</option>
          <option value="delete">löschen</option>
        </select><br>
        Abteilung: <input type="text" name="abteilung"><br>
        Nachname: <input type="text" name="nachname"><br>
        Vorname: <input type="text" name="vorname"><br>
        Nummer: <input type="text" name="nummer"><br>
        Passwort: <input type="password" name="passwort"><br>
        <input type="submit">
      </td>
    </tr>
  </table>

  
  

  <br><br>
  <p id="text1">Tabelle:</p>
  
  <?php
    include "src-backend/read.php";
    get_entire_table();
  ?>
</body>
</html>