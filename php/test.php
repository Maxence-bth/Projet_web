<select class="form-select" aria-label="Default select example">
    <option selected>Open this select menu</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
</select>


<?php
<<<<<<< Updated upstream
=======
/*header('Location: http://localhost/ING3%20web/Projet/Projet_web/signInForm.html');
exit();

>>>>>>> Stashed changes
//identifier le nom de base de données
$database = "push_n_pool";
//connectez-vous dans votre BDD
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
$db_handle = mysqli_connect('localhost', 'root', 'romain2504' );
$db_found = mysqli_select_db($db_handle, $database);
 //si le BDD existe, faire le traitement
if ($db_found) {
    $sql = "INSERT INTO person (Name, Surname, Email) VALUES ('Lucas', 'Sacomman', 'lucas.sacomman@edu.ece.fr')";
   if (mysqli_query($db_handle, $sql)) {
       echo "Ajouter avec succès <br>";
   } else {
       echo "Erreur: " . $sql . "<br>" . mysqli_error($db_handle);
   }    


    $sql = "SELECT * FROM person ";
    $result = mysqli_query($db_handle, $sql);
    while ($data = mysqli_fetch_assoc($result)) {
    echo "ID: " . $data['idPerson'] . '<br>';
    echo "Nom:" . $data['Name'] . '<br>';
    echo "Prénom: " . $data['Surname'] . '<br>';
    echo "email: " . $data['Email'] . '<br>';
    }//end while

    }//end if
//si le BDD n'existe pas
else {
 echo "Database not found";
}//end else
//fermer la connection
mysqli_close($db_handle);
?>
