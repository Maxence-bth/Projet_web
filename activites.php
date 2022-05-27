<?php
session_start();
?>

<!DOCTYPE html>

<html>
  <head>
    <title>Activités sportives</title>
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
          <a class="navbar-brand" href="index.html">ACCUEIL</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="parcourir.html">Parcourir</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="rdv.html">Rendez-vous</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Mon compte
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="compte.html">Se connecter</a></li>
                  <li><a class="dropdown-item" href="inscription.html">S'inscrire</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="chatroom.php">Chatroom</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="compte.html">Administrateurs</a></li>
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
            <img src="images/cardio.jpg" class="card-img-top" alt="erreur" width="300" height="200">
            <div class="card-body">
              <h5 class="card-title">CARDIO-TRAINING</h5>
              <p class="card-text">La salle de sport dispose de plusieurs appareils d'<strong>entrainement cardio</strong>. Les coachs vous proposent plusieurs types de séances. Ils s'adapteront à votre niveau.<br><br>
              <?php 
              //<form action='RDVweek.php' method='get'><input type='submit' name='activity' value='Cardio' src='images/reserver.png' alt='erreur' width='150' height='40'/></form>
              if($_SESSION != null){
                //<button type="button" class="btn btn-outline-secondary">Réserver</button>
                echo "<form action='RDVweek.php' method='get'><button type='submit' class='btn btn-outline-dark' name='activity' value='Cardio'>Réserver</button></form>";///METTRE LE CALENDIRER LA
              }else
              {
                echo "<a href='Connexion.php'><img src='images/reserver.png' alt='erreur' width='150' height='40'/></a>";
              }
              ?>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <img src="images/biking.jpg" class="card-img-top" alt="erreur" width="300" height="200">
            <div class="card-body">
              <h5 class="card-title">BIKING</h5>
              <p class="card-text">La salle possède aussi des vélos pour faire du <strong>Biking</strong> avec des coachs qui sauront vous faire transpirer. </p>
              <?php 
              if($_SESSION != null){
                echo "<form action='RDVweek.php' method='get'><button type='submit' class='btn btn-outline-dark' name='activity' value='Biking'>Réserver</button></form>";///METTRE LE CALENDIRER LA
              }else
              {
                echo "<a href='Connexion.php'><img src='images/reserver.png' alt='erreur' width='150' height='40'/></a>";
              }
              ?>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <img src="images/muscu.jpg" class="card-img-top" alt="erreur" width="300" height="200">
            <div class="card-body">
              <h5 class="card-title">MUSCULATION</h5>
              <p class="card-text">Vous aussi vous voulez des aussi <strong>gros muscles</strong>  que Romain, et bien c'est par ici que ca se passe. Prenez rendez-vous avec un coach et il vous rendra plus fort que jamais</p>
              <?php 
              if($_SESSION != null){
                echo "<form action='RDVweek.php' method='get'><button type='submit' class='btn btn-outline-dark' name='activity' value='Musculation'>Réserver</button></form>";///METTRE LE CALENDIRER LA
              }else
              {
                echo "<a href='Connexion.php'><img src='images/reserver.png' alt='erreur' width='150' height='40'/></a>";
              }
              ?>
            </div>
          </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="images/collectif.jpg" class="card-img-top" alt="erreur" width="300" height="200">
              <div class="card-body">
                <h5 class="card-title">COURS COLLECTIFS</h5>
                <p class="card-text">Marre d'être seul chez toi ? Ou seul à la salle ? Venez vous <strong>dépenser</strong> avec nos coachs de qualité et render jaloux vos amis</p>
                <?php 
              if($_SESSION != null){
                echo "<form action='RDVweek.php' method='get'><button type='submit' class='btn btn-outline-dark' name='activity' value='Collectif'>Réserver</button></form>";///METTRE LE CALENDIRER LA
              }else
              {
                echo "<a href='Connexion.php'><img src='images/reserver.png' alt='erreur' width='150' height='40'/></a>";
              }
              ?>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
                <img src="images/fitness.jpg" class="card-img-top" alt="erreur" width="300" height="200">
              <div class="card-body">
                <h5 class="card-title">FITNESS</h5>
                <p class="card-text">Tu veux bouger au rythme de tes musiques préférées et avoir un <strong>corps de dieu</strong>, alors c'est avec nos coachs de fintess que tu vas atteindre ton objectif</p>
                <?php 
              if($_SESSION != null){
                echo "<form action='RDVweek.php' method='get'><button type='submit' class='btn btn-outline-dark' name='activity' value='Fitness'>Réserver</button></form>";///METTRE LE CALENDIRER LA
              }else
              {
                echo "<a href='Connexion.php'><img src='images/reserver.png' alt='erreur' width='150' height='40'/></a>";
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

