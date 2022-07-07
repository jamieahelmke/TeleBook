<!--
  TELEBOOK
  Author: Jamie
  File Description:
  Edit or delete an entry
-->


  <?php
    include '../html/header.html';
    include '../../private/db.html';

    if ( isset($_POST['id']) )
    {
      echo "Gut";
      echo $_POST['id'];
    }
    else
    {
      echo "
      <script>
        window.location.href = ./viewer.php';
      <\script>";
    }

  ?>





  </body>
</html>