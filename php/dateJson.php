<?php

function endSlot($start)
{
    $end = new DateTime($start);
    $end->modify("+59 minutes");
    $end->modify("+59 seconds");
    return date_format($end, 'Y-m-d H:i:s');
}

try {
    // On se connecte à MySQL
    $mysqlClient = new PDO('mysql:host=localhost;dbname=push_n_pool;charset=utf8', 'root', 'romain2504');
} catch (Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : ' . $e->getMessage());
}
// Si tout va bien, on peut continuer

// On récupère toute les date du du 21 mai
//$sqlQuery = 'SELECT * FROM date WHERE WEEK(dateCol) = 21 AND DAY(dateCol) = 25';
//On recupere les date des rendez vous (appointments) de la personne concernée 
$sqlQuery = 'select dateCol, date.idDate, person.Name, appointments.idAppointments, appointments.idCoach  FROM date
INNER JOIN appointments
	ON date.idDate = appointments.idDate
INNER JOIN client
	ON appointments.idClient = client.idClient
INNER JOIN person
	ON client.idPerson = person.idPerson AND person.Name = "Carpentier"';
$statement = $mysqlClient->prepare($sqlQuery);
$statement->execute();
$st = $statement->fetchAll();

// On affiche chaque les person une à une
foreach ($st as $row) {
    $data[] = array(
        'id'   => $row["idDate"],
        'title'   => $row["idCoach"],
        'start'   => $row["dateCol"],
        'end'   => endSlot($row["dateCol"])
    );
}

echo json_encode($data);