<?php
$recherche = $_GET(['rechercheStr']);

if (isset($_GET["rechercheStr"]) and $_GET["submitBtn"] == "Rechercher") {
    $_GET["rechercheStr"] = htmlspecialchars($_GET["rechercheStr"]);
    $recherche = $_GET(['rechercheStr']);

    try {
        // On se connecte à MySQL
        $mysqlClient = new PDO('mysql:host=localhost;dbname=push_n_pool;charset=utf8', 'root', 'romain2504');
    } catch (Exception $e) {
        // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : ' . $e->getMessage());
    }

    // Si tout va bien, on peut continuer et on teste la valeur de la recherche, d'abord avec si c'est un nom
    try {
        $sqlQuery = 'SELECT * FROM person WHERE Name = :name';
        $statement = $mysqlClient->prepare($sqlQuery);
        $statement->execute([
            'name' => $recherche,
        ]);
    } catch (Exception $e) {
        echo "Erreur de recherche pour : " . $recherche . " <br> erreur : " . $e->getMessage();
    }
}
