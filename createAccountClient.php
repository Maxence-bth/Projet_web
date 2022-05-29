<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">

</head>

<body>
  <br>

  <div id="btn">
    <a href="index.php"><img src="images/acc.png" alt="erreur" width="150" height="40" /></a>
  </div>
</body>

</html>


<?php
$MDP = 'romain2504';
//$MDP = '';

$Prenom = isset($_POST["prenom"]) ? $_POST["prenom"] : "";
$nom = isset($_POST["nom"]) ? $_POST["nom"] : "";

$mail = isset($_POST["mail"]) ? $_POST["mail"] : "";
$adresse = isset($_POST["adresse"]) ? $_POST["adresse"] : "";
$numEtudiant = isset($_POST["numEtudiant"]) ? $_POST["numEtudiant"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";


$db_handle = mysqli_connect('localhost:3306/push_n_pool', 'root', $MDP);
$db_found = mysqli_select_db($db_handle, "push_n_pool");

// "INSERT INTO societedhonneur (ID,Prenom,Nom,DateAdhesion,Poste,Majeure,MoyenneCummulative,PaysEtudeInterl) VALUES (110, 'Manolo', 'Hina', '2018-03-15', 'VP_CONF', 'Information', 18.15, 'Canada')";
if ($db_found) {
  $sql = "INSERT INTO push_n_pool.person (Name,Surname,Email,password) VALUES('" . $nom . "','" . $Prenom . "','" . $mail . "','" . $password . "')";
  $result = mysqli_query($db_handle, $sql);
} else {
  echo "Database not found";
}
mysqli_close($db_handle);


$db_handle = mysqli_connect('localhost:3306/push_n_pool', 'root', $MDP);
$db_found = mysqli_select_db($db_handle, "push_n_pool");
$ID = 0;
if ($db_found) {
  $sql = "SELECT idPerson from push_n_pool.person WHERE Name = '" . $nom . "'";
  $result = mysqli_query($db_handle, $sql);

  while ($data = mysqli_fetch_assoc($result)) {
    $ID = $data['idPerson'];
  }
} else {
  echo "Database not found";
}

mysqli_close($db_handle);


$db_handle = mysqli_connect('localhost:3306/push_n_pool', 'root', $MDP);
$db_found = mysqli_select_db($db_handle, "push_n_pool");


if ($db_found) {
  $sql = "INSERT INTO push_n_pool.client (Student_card,Adress,idPerson) VALUES('" . $numEtudiant . "','" . $adresse . "','" . $ID . "')";
  $result = mysqli_query($db_handle, $sql);
} else {
  echo "Database not found";
}

mysqli_close($db_handle);

//header("location: http://127.0.0.1:8888/projet_web/index.html");
?>

</html>