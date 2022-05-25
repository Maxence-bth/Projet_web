<?php
session_start();

$mail = isset($_POST["mail"])? $_POST["mail"] : "";
$password = isset($_POST["password"])? $_POST["password"] : "";


$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, "push_n_pool");

if($db_found){
    $sql = "SELECT Email,password FROM push_n_pool.person WHERE Email = '".$mail."'AND password = '".$password."'";
    $result = mysqli_query($db_handle, $sql);
    $data = mysqli_fetch_assoc($result);
        
}else{
    echo "Database not found";
}

if($data != null)
{
    $_SESSION['login'] = $mail;
    echo "Vous etes connecter";
}else{
    echo "Pas de compte avec ses identifiants";
}
mysqli_close($db_handle);
?>
<html>
    <a href='Connexion.php'>revenir a la page d'acceuil</a>
</html>