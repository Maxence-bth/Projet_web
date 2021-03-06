<!DOCTYPE html>
<html>
<?php session_start(); ?>


<head>
  <title>Page d'accueil</title>
  <meta charset="utf-8" />
  <link rel="stylesheet" text="text/css" href="index.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
  <!-- <script type="text/javascript" src="index.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <br>
  <div id="title">
    <p> <img src="images/title.png" alt="erreur" width="400" height="100"></p>
  </div>

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
            <?php
            if ($_SESSION != null) {
              echo "<a class='nav-link active' aria-current='page' href='Calendar/CalendarRdvClient.php'>Rendez-vous</a>";
            } else {
              echo "<a class='nav-link active' aria-current='page' href='connexion.php'>Rendez-vous</a>";
            }
            ?>
            <!-- <a class="nav-link active" aria-current="page" href="rdv.html">Rendez-vous</a> -->
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" aria-current="page" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Mon compte
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="Connexion.php">Se connecter</a></li>
              <li><a class="dropdown-item" href="inscription.html">S'inscrire</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="chatroom.php">Chatroom</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="admin.php">Administrateurs</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <?php
            if ($_SESSION != null) {

              echo "<a class='nav-link active' aria-current='page' href='Deco.php'>Deconnexion</a>";
            }
            ?>
            <!-- <a class="nav-link active" aria-current="page" href="rdv.html">Rendez-vous</a> -->
          </li>
        </ul>
        <form class="d-flex" action="recherche.php" method="get">
          <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search" name="rechercheStr">
          <button class="btn btn-outline-success" type="submit" value="Rechercher" name="submitBtn">Rechercher</button>
        </form>
      </div>
    </div>
  </nav>



  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/carousel1.png" class="d-block w-100" alt="erreur">
      </div>
      <div class="carousel-item">
        <img src="images/carousel2.png" class="d-block w-100" alt="erreur">
      </div>
      <div class="carousel-item">
        <img src="images/carousel3.png" class="d-block w-100" alt="erreur">
      </div>
      <div class="carousel-item active">
        <img src="images/carousel4.png" class="d-block w-100" alt="erreur">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="accordion" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Qui sont les cr??ateurs ?
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          <strong>Nous un collectifs de 4 ??tudiants.</strong> Notre objectif est de cr??er un plateforme pour rendre l'acc??s ?? diff??rent sport plus simple, sans avoir ?? s'inscrire dans un club qui fait qu'un ou deux sports. Il y a Hermione Carpentier l'UX designer du groupe, Maxence Barth le gars chaud, Romain Senhadji le responsable de la BDD et Lucas Saccoman le bg.
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          L'histoire du projet
        </button>
      </h2>
      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          <strong>Ce projet est n??e autour d'une piscine ?? Aix en provence.</strong> On voulait cr??er un club de sport mais on souhaitait tous faire quelque chose de diff??rents. On a donc d??cider de cr??er une plateforme qui regroupe plusieurs sports, allant de la musculation au sport collectif.
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Quoi trouver sur la plateforme ?
        </button>
      </h2>
      <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          <strong>Notre plateforme se d??coupe en plusieurs sections</strong> Vous pouvez vous rendre dans notre salle de sport. Il y a aussi diff??rent coach disponible dans beaucoup de discipline tels que le basketball, le fitness ou encore le Tennis. Vous pouvez aussi rechercher des coachs ou des activit??s sportives.
        </div>
      </div>
    </div>
  </div>

  <div id="footer">Copyright &copy; 2022 PUSH 'N POOL<br />
    <a href="mailto:pushnpool@gmail.com">pushnpool@gmail.com </a><br />
    <a>01 22 67 89 00 </a><br />
    <a>10 rue Sextius Michel, Paris 75015 </a><br />
    <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2625.372616477147!2d2.2863485148902147!3d48.851104609174946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6701b486bb253%3A0x61e9cc6979f93fae!2s10%20Rue%20Sextius%20Michel%2C%2075015%20Paris!5e0!3m2!1sfr!2sfr!4v1653230919712!5m2!1sfr!2sfr" width="800" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></p>
  </div>


</body>

</html>