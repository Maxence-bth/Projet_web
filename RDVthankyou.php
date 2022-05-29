<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <?php
    $MDP = 'romain2504';
    $rdv = isset($_POST["inputRDV"]) ? $_POST["inputRDV"] : "";
    //echo $rdv;
    $db_handle = mysqli_connect('localhost', 'root', $MDP);
    $db_found = mysqli_select_db($db_handle, "push_n_pool");
    if ($db_found) {
        $sql = "SELECT idPerson FROM push_n_pool.person where Email = '" . $_SESSION['login'] . "'";
        $result = mysqli_query($db_handle, $sql);

        while ($data = mysqli_fetch_assoc($result)) {
            $idPerson = $data['idPerson'];
        }
    } else {
        echo "Database not found";
    }
    mysqli_close($db_handle);
    $db_handle = mysqli_connect('localhost', 'root', $MDP);
    $db_found = mysqli_select_db($db_handle, "push_n_pool");
    if ($db_found) {
        $sql = "SELECT idClient FROM push_n_pool.client where idPerson = " . $idPerson . "";
        $result = mysqli_query($db_handle, $sql);

        while ($data = mysqli_fetch_assoc($result)) {
            $idClient = $data['idClient'];
        }
    } else {
        echo "Database not found";
    }
    mysqli_close($db_handle);

    $db_handle = mysqli_connect('localhost', 'root', $MDP);
    $db_found = mysqli_select_db($db_handle, "push_n_pool");
    if ($db_found) {
        $sql = "SELECT idCoach FROM push_n_pool.coach where Activity = 'Cardio'";
        $result = mysqli_query($db_handle, $sql);

        while ($data = mysqli_fetch_assoc($result)) {
            $idCoach = $data['idCoach'];
        }
    } else {
        echo "Database not found";
    }

    mysqli_close($db_handle);

    $db_handle = mysqli_connect('localhost', 'root', $MDP);
    $db_found = mysqli_select_db($db_handle, "push_n_pool");
    if ($db_found) {
        $sql = "SELECT idDate FROM push_n_pool.date where dateCol = '" . $rdv . "'";
        $result = mysqli_query($db_handle, $sql);

        while ($data = mysqli_fetch_assoc($result)) {
            $idDate = $data['idDate'];
        }
    } else {
        echo "Database not found";
    }

    mysqli_close($db_handle);

    echo "id Personne : " . $idPerson . " id Coach : " . $idCoach . " id Date : " . $idDate;
    $db_handle = mysqli_connect('localhost', 'root', $MDP);
    $db_found = mysqli_select_db($db_handle, "push_n_pool");
    if ($db_found) {
        //INSERT INTO societedhonneur (ID,Prenom,Nom,DateAdhesion,Poste,Majeure,MoyenneCummulative,PaysEtudeInterl) VALUES (110, 'Manolo', 'Hina', '2018-03-15', 'VP_CONF', 'Information', 18.15, 'Canada')";
        $sql = "INSERT INTO push_n_pool.appointments (idClient,idCoach,idDate) VALUES(" . $idClient . "," . $idCoach . "," . $idDate . ")";
        $result = mysqli_query($db_handle, $sql);
    } else {
        echo "Database not found";
    }

    mysqli_close($db_handle);
    //INSERT ICI LE RDV DANS LA BDD
    header('Location: index.php');
    exit();
    ?>
    <meta charset="utf-8" />
    <title>Merci pour le RDV</title>
</head>
</br>

<body>
    <a href="index.php">revenir a la page d'accueil</a>
</body>