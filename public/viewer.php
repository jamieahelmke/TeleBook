<!--
  TELEBOOK
  Author: Jamie
  File Description:
  After logging in, this is the editor for editing the db.
-->

<p class="text_header">Editor</p>
<br>

<p class="text" style="text-align: center;">Tabelle:</p>

<?php
  if ($_SESSION["successful_login"] == false)
  {
    echo "
        <script>
          setTimeout(function(){
            window.location.href = 'login.php';
          }, 3000);

          var timeleft = 2;
          var downloadTimer = setInterval(function(){
            if(timeleft <= 1){
              clearInterval(downloadTimer);
            }
            document.getElementById('redirect').innerHTML = ['Zurück in ', timeleft, '...'].join('');
            timeleft -= 1;
          }, 1000);
        </script>
        <div id='login_error'><span class='material-symbols-outlined'>
        error
        </span>
        <p>Passwort oder Username inkorrekt.</p></div>
        <p id='redirect'>Etwas ist schief gelaufen (Session ungültig).</p>";
  } 
  else 
  {
    include "../private/db.php";

    echo "
    <form action='actions.php' method='POST'>
      <select name='action' class='editor_btn'>
        <option value='add'>Hinzufügen</option>
        <option value='edit'>Bearbeiten</option>
        <option value='delete'>Löschen</option>
      </select>
      <input name='Hinzufügen' class='editor_btn' type='submit' />
    </form>
    ";
    

    db_connect();
    $result = db_query("SELECT * FROM `telebook`;");
    db_close();
  
    // Create HTML Table
    echo "<table class='db_table'>";
    echo "<tr>";
    echo "<th class='db_th comment'>ID</th>";
    echo "<th class='db_th'>Abteilung</th>";
    echo "<th class='db_th'>Nachname</th>";
    echo "<th class='db_th'>Vorname</th>";
    echo "<th class='db_th'>Nummer</th>";
    echo "<th></th>";
    echo "</tr>";
  
    $counter = 1;

    // Rekursives Drucken der Tabelle
    while ($row = $result->fetch_assoc()) 
    {
        $counter = $counter + 1;
        echo
            "<tr class='db_tr'>" .
            "<td class='comment'>" . $row["id"]       . "</td>" .
            "<td class='db_td'>" . $row["abteilung"] . "</td>" .
            "<td class='db_td'>" . $row["nachname"] . "</td>" .
            "<td class='db_td'>" . $row["vorname"] . "</td>" .
            "<td class='db_td'>" . $row["nummer"] . "</td>" .
            "<td><button type='submit' onclick='edit(" . $row["id"] . ")'>Edit</button></td>" .
            "<td><button type='submit' onclick='delete(" . $row["id"] . ")'>Del</button></td>" .
            "</tr>";
    }
    echo "</table>"; 
  }

  
?>

<script>
  function edit(id) 
  {
    location.href = 'actions.d/edit.php';
  }

  function delete(id)
  {
    
  }

</script>

</body>
</html>