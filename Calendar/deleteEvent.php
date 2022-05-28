<?php
session_start();

$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];
$idClient = $_POST['idClient'];
$idCoach = 0;
//$start = date("Y-m-d H:i:s", strtotime("$start"));

// connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=push_n_pool', 'root', 'romain2504');
} catch (Exception $e) {
    exit('Impossible de se connecter à la base de données.');
}


//recupere l'id du coach correspondant à l'activité
$sql = "SELECT * FROM coach where Activity=:activity";
$q = $bdd->prepare($sql);
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
    //exit($title);
}


//Recupere l'id de la date
$sql = "SELECT * FROM date where dateCol=:dateS";
$q = $bdd->prepare($sql);
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
    //exit($start);
}


//Trouve le creneaux dans la BDD
$sql = "SELECT (idAppointments) FROM push_n_pool.appointments
INNER JOIN coach ON appointments.idCoach = coach.idCoach
                AND coach.Activity = :activity 
                AND appointments.idClient = :idClient 
                AND appointments.idDate = :idDate";
$q = $bdd->prepare($sql);
$q->execute([
    'activity' => $title,
    'idClient' => $idClient,
    'idDate' => $idDate
]);
$res = $q->fetchAll();
if ($res != null) {
    foreach ($res as $r) {
        $idAppointments = $r['idAppointments'];
    }
} else {
    exit("NO APPOINTMENTS FOUND");
}


//Supprime le creneaux dans la BDD
$sql = "DELETE FROM push_n_pool.appointments
WHERE appointments.idAppointments = :idAppointments ";
$q = $bdd->prepare($sql);
$q->execute([
    'idAppointments' => $idAppointments,
]);


exit("OK");
