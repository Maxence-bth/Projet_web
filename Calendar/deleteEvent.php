<?php
session_start();

$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];
$idClient = $_SESSION['idClient'];
$idCoach = 0;


// connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=push_n_pool', 'root', 'romain2504');
} catch (Exception $e) {
    exit('Impossible de se connecter à la base de données.');
}


//recupere l'id du coach correspondant à l'activité
$sql = "SELECT * FROM coach where Activity=:activity";
$q = $bdd->prepare($sql);
//$q->execute(array(':idClient' => $idClient, ':idCoach' => $idCoach, ':idDate' => $idDate));
$q->execute([
    'activity' => $title,
]);
$res = $q->fetchAll();

if ($res != null) {
    foreach ($res as $r) {
        $idCoach = $r['idCoach'];
    }
} else {
    //echo json_encode(array('success' => false));
    //throw new Exception();
    exit("NO ACTIVITY FOUND");
}


//Recupere l'id de la date
$sql = "SELECT * FROM date where dateCol=:dateS";
$q = $bdd->prepare($sql);
//$q->execute(array(':idClient' => $idClient, ':idCoach' => $idCoach, ':idDate' => $idDate));
$q->execute([
    'dateS' => $start,
]);
$res = $q->fetchAll();

if ($res != null) {
    foreach ($res as $r) {
        $idDate = $r['idDate'];
    }
} else {
    exit("NO DATE FOUND");
}



//Trouve le creneaux dans la BDD
$sql = "SELECT * FROM push_n_pool.appointments 
INNER JOIN coach ON appointments.idCoach = coach.idCoach AND coach.Activity = 'Biking' AND appointments.idClient = '2' AND appointments.idDate = 44;";
$q = $bdd->prepare($sql);
//$q->execute(array(':idClient' => $idClient, ':idCoach' => $idCoach, ':idDate' => $idDate));
$q->execute([
    'idClient' => $idClient,
    'idCoach' => $idCoach,
    'idDate' => $idDate
]);

//Supprime le creneaux dans la BDD
$sql = "SELECT * FROM push_n_pool.appointments 
INNER JOIN coach ON appointments.idCoach = coach.idCoach AND coach.Activity = 'Biking' AND appointments.idClient = '2' AND appointments.idDate = 44;";
$q = $bdd->prepare($sql);
//$q->execute(array(':idClient' => $idClient, ':idCoach' => $idCoach, ':idDate' => $idDate));
$q->execute([
    'idClient' => $idClient,
    'idCoach' => $idCoach,
    'idDate' => $idDate
]);

exit("OK");
