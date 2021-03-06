<?php
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Sports de compétition</title>
    <meta charset="utf-8" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" text="text/css" href="activites.css">
  </head>
  <body>
    <br>


    <div id ="title"><p> <img src="images/title.png" alt="erreur" width="400" height="100"></p></div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">ACCUEIL</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="parcourir.html">Parcourir</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="Calendar/CalendarRdvClient.php">Rendez-vous</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Mon compte
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="Connexion.php">Se connecter</a></li>
                  <li><a class="dropdown-item" href="inscription.html">S'inscrire</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="chatroom.php">Chatroom</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="admin.php">Administrateurs</a></li>
                </ul>
              </li>
  
            </ul>
            <form class="d-flex" action="recherche.php" method="get">
              <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search" name="rechercheStr">
              <button class="btn btn-outline-success" type="submit" value="Rechercher" name="submitBtn">Rechercher</button>
            </form>
          </div>
        </div>
      </nav> <br>
      



     <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
          <div class="card h-100">
            <img src="images/basket.jpg" class="card-img-top" alt="erreur" width="300" height="200">
            <div class="card-body">
              <h5 class="card-title">BASKETBALL</h5>
              <p class="card-text">Si tu veux devenir aussi fort que Mickeal Jordan et remporter tout tes matchs, alors viens t'inscrire dans l'équipe de basketball.</p>
              <?php
            if ($_SESSION != null) {
              echo "<form action='RDVweek.php' method='get'><button type='submit' class='btn btn-outline-dark' name='activity' value='Basket'>Réserver</button></form>"; ///METTRE LE CALENDIRER LA
            } else {
              echo "<a href='Connexion.php'><button type='submit' class='btn btn-outline-dark' name='activity' value='Basket'>Réserver</button></a>";
            }
            ?>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <img src="images/compete.jpg" class="card-img-top" alt="erreur" width="300" height="200">
            <div class="card-body">
              <h5 class="card-title">FOOTBALL</h5>
              <p class="card-text">Retrouve ici le meilleur entraineur de football de la région et devient un joueur pro grâce à notre coach.</p>
              <br>
              <?php
            if ($_SESSION != null) {
              echo "<form action='RDVweek.php' method='get'><button type='submit' class='btn btn-outline-dark' name='activity' value='Foot'>Réserver</button></form>"; ///METTRE LE CALENDIRER LA
            } else {
              echo "<a href='Connexion.php'><button type='submit' class='btn btn-outline-dark' name='activity' value='Foot'>Réserver</button></a>";
            }
            ?>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <img src="images/rugby.jpg" class="card-img-top" alt="erreur" width="300" height="200">
            <div class="card-body">
              <h5 class="card-title">RUGBY</h5>
              <p class="card-text">Dans cette section, tu pourras t'entrainer avec un incroyable coach qui fera de toi une machine du rugby.</p>
              <?php
            if ($_SESSION != null) {
              echo "<form action='RDVweek.php' method='get'><button type='submit' class='btn btn-outline-dark' name='activity' value='Rugby'>Réserver</button></form>"; ///METTRE LE CALENDIRER LA
            } else {
              echo "<a href='Connexion.php'><button type='submit' class='btn btn-outline-dark' name='activity' value='Rugby'>Réserver</button></a>";
            }
            ?>
            </div>
          </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="images/tennis.jpg" class="card-img-top" alt="erreur" width="300" height="200">
              <div class="card-body">
                <h5 class="card-title">TENNIS</h5>
                <p class="card-text">Certes Nadal >> Roger mais ca te dit pas devenir comme eux ? Alors rejoins notre cours de Tennis et vient t'entrainer avec notre super coach. </p>
                <?php
            if ($_SESSION != null) {
              echo "<form action='RDVweek.php' method='get'><button type='submit' class='btn btn-outline-dark' name='activity' value='Tennis'>Réserver</button></form>"; ///METTRE LE CALENDIRER LA
            } else {
              echo "<a href='Connexion.php'><button type='submit' class='btn btn-outline-dark' name='activity' value='Tennis'>Réserver</button></a>";
            }
            ?>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
                <img src="images/natation.jpg" class="card-img-top" alt="erreur" width="300" height="200">
              <div class="card-body">
                <h5 class="card-title">NATATION</h5>
                <p class="card-text">C'est ici que tu vas devenir un nageur professionnel, tout ce qu'il te reste à faire c'est prendre rendez-vous avec nos coachs.</p>
                <?php
            if ($_SESSION != null) {
              echo "<form action='RDVweek.php' method='get'><button type='submit' class='btn btn-outline-dark' name='activity' value='Natation'>Réserver</button></form>"; ///METTRE LE CALENDIRER LA
            } else {
              echo "<a href='Connexion.php'><button type='submit' class='btn btn-outline-dark' name='activity' value='Natation'>Réserver</button></a>";
            }
            ?>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
                <img src="images/plongeon.jpg" class="card-img-top" alt="erreur" width="300" height="200">
              <div class="card-body">
                <h5 class="card-title">PLONGEON</h5>
                <p class="card-text">Marre de faire des plats et rentrer à la maison avec des rougeurs ? C'est avec notre coach que tu apprendras à faire des super plongeons.</p>
                <?php
            if ($_SESSION != null) {
              echo "<form action='RDVweek.php' method='get'><button type='submit' class='btn btn-outline-dark' name='activity' value='Plongeon'>Réserver</button></form>"; ///METTRE LE CALENDIRER LA
            } else {
              echo "<a href='Connexion.php'><button type='submit' class='btn btn-outline-dark' name='activity' value='Plongeon'>Réserver</button></a>";
            }
            ?>
              </div>
            </div>
          </div>
      </div><br>
     
  
<div id="footer">Copyright &copy; 2022 PUSH 'N POOL<br />
    <a href="mailto:pushnpool@gmail.com">pushnpool@gmail.com </a><br />
    <a>01 22 67 89 00 </a><br />
    <a>10 rue Sextius Michel, Paris 75015 </a><br />
    <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2625.372616477147!2d2.2863485148902147!3d48.851104609174946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6701b486bb253%3A0x61e9cc6979f93fae!2s10%20Rue%20Sextius%20Michel%2C%2075015%20Paris!5e0!3m2!1sfr!2sfr!4v1653230919712!5m2!1sfr!2sfr" width="800" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></p>
   </div> <br>
  </body>
</html>

