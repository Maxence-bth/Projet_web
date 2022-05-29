


<?php

$MDP = 'romain2504';
//$MDP = '';

$Prenom = isset($_POST["prenom"]) ? $_POST["prenom"] : "";
$nom = isset($_POST["nom"]) ? $_POST["nom"] : "";
$bureau = isset($_POST["bureau"]) ? $_POST["bureau"] : "";
$activity = isset($_POST["activity"]) ? $_POST["activity"] : "";
$mail = isset($_POST["mail"]) ? $_POST["mail"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";


/*
$db_handle = mysqli_connect('localhost', 'root', $MDP);
$db_found = mysqli_select_db($db_handle, "push_n_pool");
// "INSERT INTO societedhonneur (ID,Prenom,Nom,DateAdhesion,Poste,Majeure,MoyenneCummulative,PaysEtudeInterl) VALUES (110, 'Manolo', 'Hina', '2018-03-15', 'VP_CONF', 'Information', 18.15, 'Canada')";
if ($db_found) {
    $sql = "INSERT INTO push_n_pool.person (Name,Surname,Email,password) VALUES('" . $nom . "','" . $Prenom . "','" . $mail . "','" . $password . "')";
    $result = mysqli_query($db_handle, $sql);
} else {
    echo "Database not found";
}
mysqli_close($db_handle);*/

// connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=push_n_pool', 'root', $MDP);
} catch (Exception $e) {
    exit('Impossible de se connecter à la base de données.');
}
$sql = "INSERT INTO person (Name,Surname,Email,password) VALUES (:name,:surname,:email,:password)";
$q = $bdd->prepare($sql);
//$q->execute(array(':idClient' => $idClient, ':idCoach' => $idCoach, ':idDate' => $idDate));
$q->execute([
    'name' => $nom,
    'surname' => $Prenom,
    'email' => $mail,
    'password' => $password
]);


$db_handle = mysqli_connect('localhost', 'root', $MDP);
$db_found = mysqli_select_db($db_handle, "push_n_pool");
$ID = 0;
if ($db_found) {
    $sql = "SELECT idPerson from push_n_pool.person WHERE Email = '" . $mail . "'";
    $result = mysqli_query($db_handle, $sql);

    while ($data = mysqli_fetch_assoc($result)) {
        $ID = $data['idPerson'];
        //echo $data['idPerson'];

    }
} else {
    echo "Database not found";
}

mysqli_close($db_handle);

/*
$db_handle = mysqli_connect('localhost', 'root', $MDP);
$db_found = mysqli_select_db($db_handle, "push_n_pool");


if ($db_found) {
    $sql = "INSERT INTO push_n_pool.coach (Office,Activity,idPerson) VALUES('NULL','NULL','" . $ID . "')";
    $result = mysqli_query($db_handle, $sql);
} else {
    echo "Database not found";
}

mysqli_close($db_handle);
*/
$sql = "INSERT INTO coach (Office,Activity,idPerson) VALUES (:office,:activity,:idPerson)";
$q = $bdd->prepare($sql);
$q->execute([
    'office' => $bureau,
    'activity' => $activity,
    'idPerson' => $ID
]);
header('Location: index.php');
exit();
?>