<?php
session_start();

$email = isset($_POST['mail_coach']) ? $_POST['mail_coach'] : ".";
$activity = isset($_POST['activity_coach']) ? $_POST['activity_coach'] : ".";

// connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=push_n_pool', 'root', 'romain2504');
} catch (Exception $e) {
    exit('Impossible de se connecter à la base de données.');
}


//recupere l'id du coach correspondant à l'email
$sql = "SELECT * FROM coach INNER JOIN person 
                ON person.idPerson = coach.idPerson 
                and (person.Email=:email or coach.Activity=:activity)";
$q = $bdd->prepare($sql);
$q->execute([
    'email' => $email,
    'activity' => $activity,
]);
$res = $q->fetchAll();

if ($res != null) {
    foreach ($res as $r) {
        $idCoach = $r['idCoach'];
        $idPerson = $r['idPerson'];
    }
} else {
    exit("NO COACH FOUND");
}

$sql = 'DELETE FROM appointments WHERE idCoach=:idCoach';
$q = $bdd->prepare($sql);
$q->execute([
    'idCoach' => $idCoach,
]);

$sql = 'DELETE FROM coach WHERE idCoach=:idCoach';
$q = $bdd->prepare($sql);
$q->execute([
    'idCoach' => $idCoach,
]);

$sql = 'DELETE FROM person WHERE idPerson=:idPerson';
$q = $bdd->prepare($sql);
$q->execute([
    'idPerson' => $idPerson,
]);

echo "<script>
alert('Coach deleted successfully'); 
window.history.go(-1);
</script>";
exit("OK");
