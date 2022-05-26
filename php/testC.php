<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
  <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" text="text/css" href="testC.css">

  <link href="../bibliotheque/fullcalendar-5.11.0/lib/main.css" rel="stylesheet" />
  <script src="../bibliotheque/fullcalendar-5.11.0/lib/main.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var calendarEl = document.getElementById("calendar");

      var calendar = new FullCalendar.Calendar(calendarEl, {
        header: { //bouttons de navigation en haut
          left: 'prev,next',
          center: 'title',
          right: 'agendaDay',
        },
        themeSystem: 'bootstrap5',
        eventBackgroundColor: 'gray',
        initialView: 'timeGridWeek', //vue weekly
        events: 'dateJson.php?name=' + '<?php echo $_GET['name']; ?>',
        selectable: true,
        selectMirror: true,
        allDaySlot: false,
        slotDuration: '01:00:00', //crénaux de 60 minutes
        aspectRatio: 2, //taille du calendrier dans la page
        //contentHeight: 400, //taille du calendrier dans la page
        expandRows: 10, //agrandit les cellules au max
        hiddenDays: [0, 6], //cache le dimanche et le samedi
        dayMaxEvents: true, // allow "more" link when too many events

        eventOverlap: false, //pas d'event qui se chevauchent
        editable: false, //pas possible de changer les events

        initialDate: new Date(), //TODAY's DATE
        navLinks: true, // can click day/week names to navigate views
        selectConstraint: [ // specify an array instead
          {
            daysOfWeek: [1, 2, 3, 4, 5], // Monday, Tuesday, Wednesday
            startTime: '07:00', // 8am
            endTime: '12:00' // 6pm
          },
          {
            daysOfWeek: [1, 2, 3, 4, 5], // Monday, Tuesday, Wednesday
            startTime: '14:00', // 8am
            endTime: '20:00' // 6pm
          }
        ],
        businessHours: [ // specify an array instead
          {
            daysOfWeek: [1, 2, 3, 4, 5], // Monday, Tuesday, Wednesday
            startTime: '07:00', // 8am
            endTime: '12:00' // 6pm
          },
          {
            daysOfWeek: [1, 2, 3, 4, 5], // Monday, Tuesday, Wednesday
            startTime: '14:00', // 8am
            endTime: '20:00' // 6pm
          }
        ],

        /*selectAllow: function(selectInfo) {
          var duration = moment.duration(selectInfo.end.diff(selectInfo.start));
          //return duration.asHours() <= 2;
          return true;
        },*/
        select: function(arg) {
          var _title = prompt("Event Title:");
          calendar.addEvent({
            title: (_title ? _title : "occupied"),
            start: arg.start,
            end: arg.end,
            /*
            ajax({
                          url = 'http://localhost/ING3%20web/Projet/Projet_web/php/add_events.php',
                          data = 'title=' + title + '&start=' + start + '&end=' + end,
                          type = "POST",
                          success = function() {
                            calendar.fullCalendar('refetchEvents');
                            alert("Added Successfully");
                          }
                        })*/
          });
          calendar.unselect();
        },
        eventClick: function(arg) {
          if (confirm("Are you sure you want to delete this event?")) {
            arg.event.remove();
          }
        },
      });

      calendar.render();
    });
  </script>
  <style>
    body {
      margin: 40px 10px;
      padding: 0;
      font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
      font-size: 14px;
    }

    #calendar {
      max-width: 1100px;
      margin: 0 auto;
    }
  </style>
</head>

<body>


  <br>
  <div id="title">
    <p> <img src="images/title.png" alt="erreur" width="400" height="100"></p>
  </div>
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
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="chatroom.php">Chatroom</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="compte.html">Administrateurs</a></li>
            </ul>
          </li>

        </ul>
        <form class="d-flex" action="../recherche.php" method="get">
          <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search" name="rechercheStr">
          <button class="btn btn-outline-success" type="submit" value="Rechercher" name="submitBtn">Rechercher</button>
        </form>
      </div>
    </div>
  </nav> <br>

  <h1 align="center"> Calendrier de <?php echo $_GET['name'] ?></h1>
  <div id="calendar" class="image-div"></div>

  <br>
  <br>
  <br>
  <div class="accordion" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Horaires d'ouverture
        </button>
      </h2>
      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          <strong>Du lundi au dimanche : 7h00 - 20h00</strong>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Règles sur l’utilisation des machines
        </button>
      </h2>
      <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          <strong>Les règles d'or à respecter :</strong>
          <ul>
            <li>Essuyez vos appareils</li>
            <li>Rangez vos poids et vos haltères </li>
            <li>Apportez votre serviette</li>
            <li>Utilisez des chaussures dédiées à la salle</li>
            <li>Ne monopolisez pas un appareil </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
          Nouveaux clients
        </button>
      </h2>
      <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          Si vous êtes un nouveau client alors vous êtes tombé dans la bonne section. Pour commencer, je vous conseille de parcourir tout le site de facon à voire tous les programmes que nous proposons. Ensuite, si l'un d'entre eux vous interresse, créez votre compte pour ensuite prendre un rendez vous avec un coach dans la discipline qui vous convient. Vous pourrez ensuite discuter avec votre coach et reprendre des cours si vous le souhaitez.
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
          Alimentation et nutrition
        </button>
      </h2>
      <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          <p>Pour progresser de façon durable sur le long terme, la nutrition joue un rôle important. En effet, elle est considérée comme le carburant de votre corps et de vos muscles qui vont l’utiliser et la consommer durant les entraînements. Adopter une alimentation équilibrée et adaptée à vos objectifs est la clé pour vous permettre d’améliorer votre force et performances tout en vous développant physiquement. Pour cela, il est nécessaire de calculer tous vos apports caloriques dans la journée pour fournir à votre organisme ce dont il a besoin. Nous vous conseillons de privilégier des aliments les plus naturels et les moins transformés possible pour de meilleurs résultats aussi bien sur le plan physique que santé.
          </p>
          <ul>
            <li>Consommer au moins une portion de protéines, glucides et lipides à chaque repas. Ces macronutriments essentiels sont indispensables et doivent être apportés dans des quantités raisonnables.</li>
            <li>Consommer des légumes à chaque repas. Souvent délaissés, les légumes jouent un rôle primordial dans l’équilibre acido-basique et fournissent de bons nutriments à l’organisme.</li>
            <li>Etablir plusieurs repas dans la journée pour un apport constant. Vous pouvez manger environ toutes les 3h comme en prenant un petit-déjeuner, un déjeuner, un diner et fixer 1 à 2 collations entre ces repas.</li>
            <li>Eviter la consommation de sodas, d’alcool et de sucreries. Composés de calories dites « vides », ils ne vous aideront pas à atteindre vos objectifs et au contraire, peuvent ralentir votre progression.</li>

          </ul>
          La nutrition sportive est indispensable aussi pour la bonne santé de votre corps. La qualité de vos aliments va permettre d’assurer le bon fonctionnement général du cerveau, des muscles et des organes. Pour cela, veillez à déterminer votre total calorique journalier et de consommer des aliments sains pour y parvenir.
        </div>
      </div>
    </div>
  </div>
  <br>


  <div id="footer">Copyright &copy; 2022 PUSH 'N POOL<br />
    <a href="mailto:pushnpool@gmail.com">pushnpool@gmail.com </a><br />
    <a>01 22 67 89 00 </a><br />
    <a>10 rue Sextius Michel, Paris 75015 </a><br />
    <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2625.372616477147!2d2.2863485148902147!3d48.851104609174946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6701b486bb253%3A0x61e9cc6979f93fae!2s10%20Rue%20Sextius%20Michel%2C%2075015%20Paris!5e0!3m2!1sfr!2sfr!4v1653230919712!5m2!1sfr!2sfr" width="800" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></p>
  </div> <br>
</body>

</html>