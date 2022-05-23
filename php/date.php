<?php

function createSlotDay($day)
{
    //$day = new DateTime($day);
    $array = [];

    date_time_set($day, 7, 0, 0);
    array_push($array, date_format($day, 'Y-m-d H:i:s'));
    for ($i = 0; $i < 2; $i++) {
        $day->modify("+1 hours");
        array_push($array, date_format($day, 'Y-m-d H:i:s'));
    }
    $day->modify("+6 hours");
    for ($i = 0; $i < 4; $i++) {
        $day->modify("+1 hours");
        array_push($array, date_format($day, 'Y-m-d H:i:s'));
    }

    /*$int = 0;
    foreach ($array as $value) {
        $int = $int + 1;
        echo "le " . $int . " -> " . $value . "<br>";
    }*/
    return $array;
}

function createDateWeek($dateStart)
{
    $dateStart = new DateTime($dateStart);
    $dates = [];

    for ($i = 0; $i < 7; $i++) {
        $temp = createSlotDay($dateStart);
        foreach ($temp as $value) {
            array_push($dates, $value);
        }
        $dateStart->modify("+1 days");
    }
    /*$int = 0;
    foreach ($dates as $value) {
        $int = $int + 1;
        echo "le " . $int . " -> " . $value . "<br>";
    }*/
    return $dates;
}


//identifier le nom de base de données
$database = "push_n_pool";
//connectez-vous dans votre BDD
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
$db_handle = mysqli_connect('localhost', 'root', 'romain2504');
$db_found = mysqli_select_db($db_handle, $database);
//si le BDD existe, faire le traitement
if ($db_found) {
    createDateWeek($_POST["date1"]);

    $sql = "SELECT * FROM person ";
    $result = mysqli_query($db_handle, $sql);
    while ($data = mysqli_fetch_assoc($result)) {
        echo "ID: " . $data['idPerson'] . '<br>';
        echo "Nom:" . $data['Name'] . '<br>';
        echo "Prénom: " . $data['Surname'] . '<br>';
        echo "email: " . $data['Email'] . '<br>';
    } //end while

} //end if
//si le BDD n'existe pas
else {
    echo "Database not found";
} //end else
//fermer la connection
mysqli_close($db_handle);
