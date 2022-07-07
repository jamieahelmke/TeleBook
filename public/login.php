<!--
  TELEBOOK
  Author: Jamie
  File Description:
  Imports the head, gets cookies and tries to log into the db.
-->
<?php
  session_start();

  include "html/header.html";
  
  if (isset($_POST['login_username']) && isset($_POST['login_password'])) 
  {
    // Passwort: 'password'
    $user = $_POST['login_username'];
    $pass = $_POST['login_password'];
    $password_hash = "5f4dcc3b5aa765d61d8327deb882cf99"; //MD5 Hash password
  

    if ($user === "admin" && md5($pass) === $password_hash) 
    {
      // EINGELOGGT
      $_SESSION['successful_login']=true;
      include "viewer.php";
    }
    else 
    {
      // FALSCHES PASSWORT ODER USERNAME
      // Wenn das PW falsch ist wird dieser JS Code ausgeführt. Der leitet einen zurück
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
      <p id='redirect'>Zurück in 3...</p>";
    }
  }
  else
  {
    // UNGESETZTES PASSWORT
    echo "
    <p id='login_header'>Login</p>
    <div id='login_form'>
      <form action='login.php' method='POST'>
        <table>
          <tr>
            <td><input id='login_input' placeholder='Username' type='text'id='login-input' name='login_username' autocomplete='off'></td>
          </tr>
          <tr>
            <td><input id='login_input' placeholder='Passwort' type='password' id='login-input' name='login_password' autocomplete='off'><td>
          </tr>
          <tr>
            <td><button id='login_button' 'type='submit'>Absenden</button></td>
          </tr>
        </table>
      </form>
    </div>

    <p class='comment'> // user='admin', password='password' </p>";
}
?>
</body>
</html>
