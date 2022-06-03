<html>

<head>
    <title>Affichage CV</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" text="text/css" href="CV.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<?php
$MDP = 'romain2504';

$activity = $_GET['activity'];
//$activity = 'Cardio';


$db_handle = mysqli_connect('localhost:3306/push_n_pool', 'root', $MDP);
$db_found = mysqli_select_db($db_handle, "push_n_pool");
if ($db_found) {
    $sql = "SELECT idCoach,idPerson FROM push_n_pool.coach where Activity = '" . $activity . "'";
    $result = mysqli_query($db_handle, $sql);
    while ($data = mysqli_fetch_assoc($result)) {
        $idCoach = $data['idCoach'];
        $idperson = $data['idPerson'];
    }
} else {
    echo "Database not found";
}
//echo "</br>id coach = ". $idCoach;

mysqli_close($db_handle);
$db_handle = mysqli_connect('localhost:3306/push_n_pool', 'root', $MDP);
$db_found = mysqli_select_db($db_handle, "push_n_pool");
if ($db_found) {
    $sql = "SELECT Email FROM push_n_pool.person where idPerson = " . $idperson;
    $result = mysqli_query($db_handle, $sql);
    while ($data = mysqli_fetch_assoc($result)) {
        $mail = $data['Email'];
    }
} else {
    echo "Database not found";
}
//echo "</br>id coach = ". $idCoach;

mysqli_close($db_handle);

$xml = simplexml_load_file(__DIR__ . "/" . $mail . ".xml") or die("Error: Cannot create object");
?>

<body>
    <div id="title">
        <p> <img src="images/title.png" alt="erreur" width="400" height="100"></p>
    </div><br>
    <fieldset> <br>
        <div id="center">
            <h1>CV du Coach : </h1><br>
            <strong>Téléphone :</strong> <?php echo ($xml->telephone); ?> <br>
            <strong>Nom :</strong> <?php echo ($xml->nom); ?> <br>
            <strong>Âge :</strong><?php echo ($xml->age); ?> <br>
            <strong>Mail :</strong> <?php echo ($xml->mail); ?> <br>
            <strong>Formation :</strong> <?php echo ($xml->formation); ?> <br>
            <strong>Expérience :</strong> <?php echo ($xml->experience); ?> <br><br>
            <a href="index.php"><button type="button" class="btn btn-outline-light">Retour accueil</button></a> <br><br>
        </div>
    </fieldset>

</body>

</html>