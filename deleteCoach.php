<?php
session_start();

$email = $_POST['mail_coach'];

// connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=push_n_pool', 'root', 'romain2504');
} catch (Exception $e) {
    exit('Impossible de se connecter à la base de données.');
}


//recupere l'id du coach correspondant à l'activité
$sql = "SELECT * FROM coach where Email=:email";
$q = $bdd->prepare($sql);
$q->execute([
    'email' => $email,
]);
$res = $q->fetchAll();

if ($res != null) {
    foreach ($res as $r) {
        $idCoach = $r['idCoach'];
    }
} else {
    //echo json_encode(array('success' => false));
    //throw new Exception();
    exit("NO COACH FOUND");
    //exit($title);
}

$sqlQuery = 'select person.idPerson, appointments.idAppointments FROM appointments
            INNER JOIN coach
                ON coach.idCoach = appointments.idCoach AND coach.Activity = :activity
            INNER JOIN person
                ON coach.idPerson = person.idPerson';
$statement = $mysqlClient->prepare($sqlQuery);
$statement->execute([
    'activity' => $_GET['activity'],
]);


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
