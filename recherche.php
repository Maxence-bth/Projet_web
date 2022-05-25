<?php

if (isset($_GET["rechercheStr"]) && $_GET["submitBtn"] == "Rechercher") {
    $recherche = htmlspecialchars($_GET["rechercheStr"]); //pour sécuriser le formulaire contre les failles html
    //$recherche = $_GET(['rechercheStr']);
    $recherche = strip_tags($recherche); //pour supprimer les balises html dans la requête
    $recherche = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $recherche); //supprime les espaces, retour a la ligne et tabulation
    echo $recherche . "--<br>";
    $recherches = explode(" ", $recherche);
    foreach ($recherches as $recherche) {
        echo "  --" . $recherche . "--<br>";
    }

    try {
        // On se connecte à MySQL
        $mysqlClient = new PDO('mysql:host=localhost;dbname=push_n_pool;charset=utf8', 'root', 'romain2504');
    } catch (Exception $e) {
        // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : ' . $e->getMessage());
    }

    $results = [];
    foreach ($recherches as $r) { //test les noms et prenoms
        $sqlQuery = "select * from person inner join coach on 
        ((person.Name=:data or person.Surname=:data) and coach.idPerson = person.idPerson) or 
        (person.idPerson = coach.idPerson and coach.Activity = :data)";
        $statement = $mysqlClient->prepare($sqlQuery);
        $statement->execute([
            'data' => $r,
        ]);
        $temp = $statement->fetchAll();
        $results = array_merge($results, $temp);
    }

    $i = 0;
    echo '
    <select class="form-select" multiple aria-label="multiple select example">
        <option selected>Open this select menu</option>';
    foreach ($results as $res) {
        $i++;
        echo "<option value=$i>One</option>";
    }
    echo "</select>";
}
