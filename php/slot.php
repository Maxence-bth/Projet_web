<?php
try {
    // On se connecte à MySQL
    $mysqlClient = new PDO('mysql:host=localhost;dbname=push_n_pool;charset=utf8', 'root', 'romain2504');
} catch (Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : ' . $e->getMessage());
}

// Si tout va bien, on peut continuer

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
