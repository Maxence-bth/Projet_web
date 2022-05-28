<?php
session_start();

?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" text="text/css" href="connexion.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">

    <style>
        #center {
            background-color: whitesmoke;
            align-items: center;
        }
    </style>

</head>

<body>


    <div id="center">
        <br><br>
        <div id="title">
            <p> <img src="images/title.png" alt="erreur" width="400" height="100"></p>
        </div> <br><br>
        <h1>Admin</h1> <br>
        <form action="Calendar/CalendarRdvCoach.php" method="get">
            <form class="row g-3">
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="activity" placeholder="Entrer l'activité pour voir son emploie du temps">
                </div><br><br>
                <div class="col-12">
                    <button type="submit" class="btn btn-outline-danger">Valider</button>
                    <a href="index.php"><button type="button" class="btn btn-outline-danger">Retour accueil</button></a>
                </div>
            </form>

        </form>
    </div>




</body>

</html>