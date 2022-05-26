<?php

function rechercher($recherche)
{
    $recherche = htmlspecialchars($recherche); //pour sécuriser le formulaire contre les failles html
    $recherche = strip_tags($recherche); //pour supprimer les balises html dans la requête
    $recherche = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $recherche); //supprime les espaces, retour a la ligne et tabulation
    //echo $recherche . "--<br>";
    $recherches = explode(" ", $recherche);
    /*foreach ($recherches as $recherche) {
        echo "  --" . $recherche . "--<br>";
    }*/

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

    if (count($results) < 1) {
        echo '<script language="Javascript">
                alert ("Pas de résultats" )
              </script>';
        header('Location: sallesport.html');
        exit();
    }

    $i = 0;
    echo "
    <FORM action='php/testC.php' method='get'>
    <SELECT name='name' size='5'>";
    foreach ($results as $res) {
        $i++;
        if ($i == 1) //on selectionne le premier element de la liste par défault
            echo '<option value=' . $res['Name'] . ' selected>' . $res['Name'] . ' ' . $res['Surname'] . ' -- Activity : ' . $res['Activity'] . '</option>';
        else
            echo '<option value=' . $res['Name'] . '>' . $res['Name'] . ' ' . $res['Surname'] . ' -- Activity : ' . $res['Activity'] . '</option>';
    }
    echo "</SELECT>
    <button type='submit' value='rech'>Rechercher</button>
    </FORM>";
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Exemple Result</title>
    <link rel="stylesheet" href="chatroom.css" />
</head>

<body>
    <?php
    if (isset($_GET["rechercheStr"]) && $_GET["submitBtn"] == "Rechercher") {
        rechercher($_GET["rechercheStr"]);
    }
    ?>

</body>

</html>