<select class="form-select" aria-label="Default select example">
    <option selected>Open this select menu</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
</select>


<?php

/*
header('Location: http://localhost/ING3%20web/Projet/Projet_web/signInForm.html');
exit();
//identifier le nom de base de données
$database = "push_n_pool";
//connectez-vous dans votre BDD
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
$db_handle = mysqli_connect('localhost', 'root', 'romain2504');
$db_found = mysqli_select_db($db_handle, $database);
//si le BDD existe, faire le traitement
if ($db_found) {
    $sql = "INSERT INTO person (Name, Surname, Email) VALUES ('Lucas', 'Sacomman', 'lucas.sacomman@edu.ece.fr')";
    if (mysqli_query($db_handle, $sql)) {
        echo "Ajouter avec succès <br>";
    } else {
        echo "Erreur: " . $sql . "<br>" . mysqli_error($db_handle);
    }
try {
    // On se connecte à MySQL
    $mysqlClient = new PDO('mysql:host=localhost;dbname=push_n_pool;charset=utf8', 'root', 'romain2504');
} catch (Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : ' . $e->getMessage());
}

// Si tout va bien, on peut continuer

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

/*
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

// On récupère tout le contenu de la table person
$sqlQuery = 'SELECT * FROM Person';
$personStatement = $mysqlClient->prepare($sqlQuery);
$personStatement->execute();
$persons = $personStatement->fetchAll();

// On affiche chaque les person une à une
foreach ($persons as $person) {
?>
    <p><?php echo $person['Name'] . " -- " . $person["Surname"] . " -- " . $person["Email"]; ?></p>
<?php
}
?>
*/