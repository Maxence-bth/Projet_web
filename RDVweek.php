<html>
  <head>
    <title>Page d'accueil</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" text="text/css" href="RDVweek.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  </head>

  <body>
    <?php
      $activity = $_GET['activity'];
      echo "<form action='CardioCalender.php' method='POST'>";
    ?>
  
    <div id="title">
      <p> <img src="images/title.png" alt="erreur" width="400" height="100"></p>
    </div><br>
    <div id="choix">
      <p>Choisissez la semaine à consulter : <br><br><input type="week" name="date1" /></p>
      <br>
      <button type="submit" name="createDate 1 week" value="Submit" class="btn btn-outline-light">Valider</button><br>
      <input type='text' value ='<?php echo $_GET['activity'];?>' name = 'activity' hidden readonly='true'>
    </div>
    </form>
  </body>
  
</html>
