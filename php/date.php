<?php

function createDateDay($day)
{
    //$day = new DateTime($day);
    $array = [];

    date_time_set($day, 7, 0, 0);
    array_push($array, date_format($day, 'Y-m-d H:i:s'));
    for ($i = 0; $i < 12; $i++) {
        $day->modify("+1 hours");
        array_push($array, date_format($day, 'Y-m-d H:i:s'));
    }
    /*$day->modify("+6 hours");
    for ($i = 0; $i < 4; $i++) {
        $day->modify("+1 hours");
        array_push($array, date_format($day, 'Y-m-d H:i:s'));
    }*/

    /*$int = 0;
    foreach ($array as $value) {
        $int = $int + 1;
        echo "le " . $int . " -> " . $value . "<br>";
    }*/
    return $array;
}

function createDateWeek($dateStart)
{
    //$dateStart = new DateTime($dateStart);
    $dates = [];

    for ($i = 0; $i < 7; $i++) {
        $temp = createDateDay($dateStart);
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

function createDateMonth($dateStart)
{
    $dateStart = new DateTime($dateStart);
    $dates = [];

    for ($i = 0; $i < 4; $i++) {
        $temp = createDateWeek($dateStart);
        foreach ($temp as $value) {
            array_push($dates, $value);
        }
        //$dateStart->modify("+1 weeks");
    }
    $int = 0;
    foreach ($dates as $value) {
        $int = $int + 1;
        echo "le " . $int . " -> " . $value . "<br>";
    }
    return $dates;
}

try {
    // On se connecte à MySQL
    $mysqlClient = new PDO('mysql:host=localhost;dbname=push_n_pool;charset=utf8', 'root', 'romain2504');
} catch (Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : ' . $e->getMessage());
}

// Si tout va bien, on peut continuer
$dates = createDateMonth($_POST["date1"]);

foreach ($dates as $date) {
    $sqlQuery = 'INSERT INTO date(dateCol) value (:date)';
    $statement = $mysqlClient->prepare($sqlQuery);
    $statement->execute([
        'date' => $date,
    ]);
}
