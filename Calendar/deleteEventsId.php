<?php
session_start();

$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];
$idAppointments = $_POST['idAppointments'];
//$start = date("Y-m-d H:i:s", strtotime("$start"));

// connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=push_n_pool', 'root', 'romain2504');
} catch (Exception $e) {
    exit('Impossible de se connecter à la base de données.');
}

//Supprime le creneaux dans la BDD
$sql = "DELETE FROM push_n_pool.appointments
WHERE appointments.idAppointments = :idAppointments ";
$q = $bdd->prepare($sql);
$q->execute([
    'idAppointments' => $idAppointments,
]);


exit("OK");
