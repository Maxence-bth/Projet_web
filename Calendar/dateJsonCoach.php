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
/*$sqlQuery = 'select date.dateCol, coach.Activity, date.idDate, person.Name, appointments.idCoach, appointments.idClient FROM date
INNER JOIN appointments
	ON date.idDate = appointments.idDate
INNER JOIN coach
	ON coach.idCoach = appointments.idCoach
INNER JOIN person
	ON coach.idPerson = person.idPerson AND person.Name=:name';
$statement = $mysqlClient->prepare($sqlQuery);
$statement->execute([
    'name' => $_GET['name'],
]);*/
$sqlQuery = 'select date.dateCol, coach.Activity, date.idDate, person.Name, appointments.idAppointments, appointments.idCoach, appointments.idClient FROM date
INNER JOIN appointments
	ON date.idDate = appointments.idDate
INNER JOIN coach
	ON coach.idCoach = appointments.idCoach AND coach.Activity = :activity
INNER JOIN person
	ON coach.idPerson = person.idPerson';
$statement = $mysqlClient->prepare($sqlQuery);
$statement->execute([
    'activity' => $_GET['activity'],
]);

$st = $statement->fetchAll();

// On affiche chaque les person une à une
foreach ($st as $row) {
    if ($row["idClient"] == 0) {
        $title = 'Unavailable';
        $color = "#ef6969";
    } else {
        $title = $row["Activity"] . " - Client." . $row["idClient"];
        $color = "#6a7ed7";
    }
    $data[] = array(
        'title'   => $title,
        'id'   => $row["idDate"],
        'start'   => $row["dateCol"],
        'end'   => endSlot($row["dateCol"]),
        'backgroundColor' => $color,
        'extendedProps' => [
            'idCoach'   => $row["idCoach"],
            'idAppointments' => $row["idAppointments"],
            'idClient'   => $row["idClient"],
        ]
    );
}

echo json_encode($data);
