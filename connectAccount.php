<?php
session_start();

$MDP = 'romain2504';
//$MDP = '';

$mail = isset($_POST["mail"]) ? $_POST["mail"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";


$db_handle = mysqli_connect('localhost', 'root', $MDP);
$db_found = mysqli_select_db($db_handle, "push_n_pool");

if ($db_found) {
    $sql = "SELECT Email,password,idPerson, Name, Surname  FROM push_n_pool.person WHERE Email = '" . $mail . "'AND password = '" . $password . "'";
    $result = mysqli_query($db_handle, $sql);
    $data = mysqli_fetch_assoc($result);
} else {
    echo "Database not found";
}
//$sql = "SELECT * FROM push_n_pool.client where idPerson = 1"; 

if ($data != null) {
    $_SESSION['login'] = $mail;
    $_SESSION['Nom'] = $data['Name'];
    $_SESSION['Prenom'] = $data['Surname'];
    $_SESSION['idPerson'] = $data['idPerson'];
    //$_SESSION['coach'] = 
    $idPerson = $data['idPerson'];
    echo "Vous etes connecter";
} else {
    echo "Pas de compte avec ses identifiants";
    $idPerson = 0;
}
mysqli_close($db_handle);

$db_handle = mysqli_connect('localhost', 'root', $MDP);
$db_found = mysqli_select_db($db_handle, "push_n_pool");

if ($db_found) {
    $sql = "SELECT * FROM push_n_pool.client where idPerson =" . $idPerson;
    $result = mysqli_query($db_handle, $sql);
    $data = mysqli_fetch_assoc($result);
} else {
    echo "Database not found";
}
if ($data != null) {
    $_SESSION['coach'] = 0;
    $_SESSION['idClient'] = $data['idClient'];
    // echo 'client';
} else {
    $_SESSION['idClient'] = 0;
    $_SESSION['coach'] = 1;
    //echo 'coach';
}
mysqli_close($db_handle);
?>
<html>
</br>
<a href='index.php'>revenir a la page d'acceuil</a>

</html>