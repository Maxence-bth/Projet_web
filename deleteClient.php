<?php
session_start();

$email = isset($_POST['mail_client']) ? $_POST['mail_client'] : ".";
$idClient = isset($_POST['id_client']) ? $_POST['id_client'] : ".";

// connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=push_n_pool', 'root', 'romain2504');
} catch (Exception $e) {
    exit('Impossible de se connecter à la base de données.');
}


//recupere l'id du coach correspondant à l'email
$sql = "SELECT * FROM client INNER JOIN person 
                ON person.idPerson = client.idPerson 
                and (person.Email=:email or client.idClient=:idClient)";
$q = $bdd->prepare($sql);
$q->execute([
    'email' => $email,
    'idClient' => $idClient,
]);
$res = $q->fetchAll();

if ($res != null) {
    foreach ($res as $r) {
        $idClient = $r['idClient'];
        $idPerson = $r['idPerson'];
    }
} else {
    exit("NO CLIENT FOUND");
}

$sql = 'DELETE FROM appointments WHERE idClient=:idClient';
$q = $bdd->prepare($sql);
$q->execute([
    'idClient' => $idClient,
]);

$sql = 'DELETE FROM client WHERE idClient=:idClient';
$q = $bdd->prepare($sql);
$q->execute([
    'idClient' => $idClient,
]);

$sql = 'DELETE FROM person WHERE idPerson=:idPerson';
$q = $bdd->prepare($sql);
$q->execute([
    'idPerson' => $idPerson,
]);

echo "<script>
alert('Client deleted successfully'); 
window.history.go(-1);
</script>";
exit("OK");
