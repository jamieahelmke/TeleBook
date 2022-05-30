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



  <!-- Lösche Inhalt aus der DB -->
  <div class="center">
    <form action="./edit.php" method="POST">
      <label for="nummer">Lösche Eintrag mit Nummer:</label>
      <input type="nummer" id="nummer" name="nummer" />
      <br>
      <label for="passwort">Mit Passwort bestätigen:</label>
      <input type="password" id="passwort" name="passwort" />
      <br>
      <button type="submit">Bestätigen</button>
    </form>
  </div>
  

  <br><br>
  <p id="text1">Tabelle:</p>
  
  <?php
    include '../src-backend/db.php';

    // Check Args
    if ( isset($_POST['nummer']) ) {
      if ( isset($_POST['passwort']) ) {
        $nummer = $_POST['nummer'];

        db_connect();
        $server_answer = db_query("SELECT * FROM `telebook` WHERE nummer = $nummer");
        db_close();
        echo $server_answer;
        
      } else {
        echo "Passwort wird benötigt."; 
      }
    } else {
      echo "Nummer wird benötigt."; 
    }
  ?>
</body>
</html>