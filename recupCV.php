<?php
$MDP = '';

//$activity = $_GET['activity'];
$activity = 'Cardio';


$db_handle = mysqli_connect('localhost', 'root', $MDP);
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
$db_handle = mysqli_connect('localhost', 'root', $MDP);
$db_found = mysqli_select_db($db_handle, "push_n_pool");
if ($db_found) {
    $sql = "SELECT Email FROM push_n_pool.person where idPerson = ".$idperson;
    $result = mysqli_query($db_handle, $sql);
    while ($data = mysqli_fetch_assoc($result)) {
        $mail = $data['Email'];
    }
} else {
    echo "Database not found";
}
//echo "</br>id coach = ". $idCoach;

mysqli_close($db_handle);

$xml=simplexml_load_file(__DIR__."/".$mail.".xml") or die("Error: Cannot create object");

echo ($xml->telephone);
echo '</br>';
echo ($xml->nom);
echo '</br>';
echo ($xml->age);
echo '</br>';
echo ($xml->mail);
echo '</br>';
echo ($xml->formation);
echo '</br>';
echo ($xml->experience);
echo '</br>';
?>