<?php
session_start();

$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];
$idClient = $_SESSION['idClient'];
$idCoach = 0;
$idDate = 8;


function dateDiff($date1, $date2)
{
    $diff = abs(strtotime($date1) - strtotime($date2)); // abs pour avoir la valeur absolute, ainsi éviter d'avoir une différence négative
    $retour = array();

    $tmp = $diff;
    $retour['second'] = $tmp % 60;

    $tmp = floor(($tmp - $retour['second']) / 60);
    $retour['minute'] = $tmp % 60;

    $tmp = floor(($tmp - $retour['minute']) / 60);
    $retour['hour'] = $tmp % 24;

    $tmp = floor(($tmp - $retour['hour'])  / 24);
    $retour['day'] = $tmp;

    return $retour;
}
$diff = dateDiff($start, $end);

//echo "----" . $title . "<br>" . $start . "<br>" . $end;

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


for ($i = 0; $i < $diff['hour']; $i++) {
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

    $sql = "SELECT * FROM push_n_pool.appointments WHERE idDate=:idDate and idClient='0' and idCoach=:idCoach";
    $q = $bdd->prepare($sql);
    //$q->execute(array(':idClient' => $idClient, ':idCoach' => $idCoach, ':idDate' => $idDate));
    $q->execute([
        'idDate' => $idDate,
        'idCoach' => $idCoach,
    ]);
    $res = $q->fetchAll();

    if ($res != null) {
        exit("DATE NON DISPONIBLE");
    }

    //Sauvegarde le creneaux dans la BDD
    $sql = "INSERT INTO appointments (idClient, idCoach, idDate) VALUES (:idClient, :idCoach, :idDate)";
    $q = $bdd->prepare($sql);
    //$q->execute(array(':idClient' => $idClient, ':idCoach' => $idCoach, ':idDate' => $idDate));
    $q->execute([
        'idClient' => $idClient,
        'idCoach' => $idCoach,
        'idDate' => $idDate
    ]);

    $start = date("Y-m-d H:i:s", strtotime("$start +1 hours"));
}

exit("OK");
