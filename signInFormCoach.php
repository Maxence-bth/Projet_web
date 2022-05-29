<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" text="text/css" href="signInForm.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">

</head>

<body>
  <br>
  <div id="title">
    <p> <img src="images/title.png" alt="erreur" width="400" height="100"></p>
  </div>
  <fieldset>
    <br><br>
    <form action="createAccountCoach.php" method="post">

      <form class="row g-3">
        <div class="col-sm-5">

          <input type="text" class="form-control" name="nom" placeholder="Nom">
        </div><br>
        <div class="col-sm-5">

          <input type="text" class="form-control" name="prenom" placeholder="Prénom">
        </div><br>
        <div class="col-sm-5">
        <select name="activity" id="">
           <option valeur="Basket">Basketball</option>
   <option valeur="Biking">Biking</option>
   <option valeur="Tennis">Tennis</option>
   <option valeur="Rugny">Rugny</option>
   <option valeur="Musculation">Biking</option>
   <option valeur="Collectif">Collectif</option>
   <option valeur="Fitness">Fitness</option>
   <option valeur="Foot">Foot</option>
   <option valeur="Natation">Natation</option>
   <option valeur="Plongeon">Plongeon</option>
   
   
        </select>
  
          <?php //<input type="text" class="form-control" name="activity" placeholder="Activité">?>
        </div><br>
        <div class="col-sm-5">

          <input type="text" class="form-control" name="bureau" placeholder="Bureau">
        </div><br>
        <div class="col-sm-5">

          <input type="email" class="form-control" name="mail" placeholder="Email">
        </div><br>
        <div class="col-sm-5">

          <input type="password" class="form-control" id="password" placeholder="Mot de passe" name="password">
        </div><br>

        <div class="col-12">
          <button type="submit" class="btn btn-outline-light">Valider</button>
          <a href="index.php"><button type="button" class="btn btn-outline-light">Retour accueil</button></a>
        </div>
      </form>
      <div id="errordiv"></div>
  </fieldset>



</body>

</html>