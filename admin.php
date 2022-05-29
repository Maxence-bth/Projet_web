<?php
session_start();

?>

<!DOCTYPE html>

<html>

<head>
    <title>Administrateurs</title>
    <meta charset="utf-8" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" text="text/css" href="admin.css">
</head>

<body>
    <div id="title">
        <p> <img src="images/title.png" alt="erreur" width="400" height="100"></p>
    </div><br>
    <div id="left">
        <h1>Supprimer un client</h1>
        <form action="" method="post">
            <form class="row g-3">
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="mail_client" placeholder="Mail">
                </div><br>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="mdp_client" placeholder="Password">
                </div><br>
                <div class="col-12">
                    <button type="submit" class="btn btn-outline-light">Supprimer Client</button>
                </div>
            </form>
        </form>
    </div>
    <div id="right">
        <h1>Supprimer un coach</h1>
        <form action="deleteCoach.php" method="post">
            <form class="row g-3">
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="mail_coach" placeholder="Mail">
                </div><br>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="mdp_coach" placeholder="Password">
                </div><br>
                <div class="col-12">
                    <button type="submit" class="btn btn-outline-light">Supprimer Coach</button>
                </div>
            </form>
            </forme>
    </div>
    <br>
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
</body>