<?php

//$title = $_POST['title'];
//$start = $_POST['start'];
//$end = $_POST['end'];
//echo "----" . $title . "<br>" . $start . "<br>" . $end;

// connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=push_n_pool', 'root', 'romain2504');
} catch (Exception $e) {
    exit('Impossible de se connecter à la base de données.');
}

$sql = "INSERT INTO appointments (idClient, idCoach, idDate) VALUES (:idClient, :idCoach, :idDate)";
$q = $bdd->prepare($sql);
//$q->execute(array(':idClient' => $idClient, ':idCoach' => $idCoach, ':idDate' => $idDate));
$q->execute([
    'idClient' => 2,
    'idCoach' => 1,
    'idDate' => 45
]);
