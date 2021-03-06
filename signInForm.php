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
    <form action="createAccountClient.php" method="post">

      <form class="row g-3">
        <div class="col-sm-5">

          <input type="text" class="form-control" name="nom" placeholder="Nom" minlength="2" required>
        </div><br>
        <div class="col-sm-5">

          <input type="text" class="form-control" name="prenom" placeholder="Prénom" minlength="2" required>
        </div><br>
        <div class="col-sm-5">

          <input type="email" class="form-control" name="mail" placeholder="Email" minlength="2" required>
        </div><br>
        <div class="col-sm-5">

          <input type="password" class="form-control" id="password" placeholder="Mot de passe" name="password" minlength="2" required>
        </div><br>
        <div class="col-sm-5">

          <input type="text" class="form-control" name="adresse" placeholder="Adresse">
        </div><br>
        <div class="col-sm-5">

          <input type="text" class="form-control" name="numEtudiant" placeholder="N° Carte étudiant" minlength="2" required>
        </div>
        <br>
        <div class="col-12">
          <button type="submit" class="btn btn-outline-light">Valider</button>
          <a href="index.php"><button type="button" class="btn btn-outline-light">Retour accueil</button></a>
        </div>
      </form>
      <div id="errordiv"></div>
    </form>
  </fieldset>



</body>

</html>