<html>

<head>
<meta charset="utf-8" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <style type="text/css">

        body{
            background-image: url("images/piscine.png");
        }

        #title{
        text-align: center;
        }

        #center{
            margin-left: 40%;
        }

        #info{
            color: white;
            font-size: x-large;
            text-align: center;
        }

        h1{
            font: bold;
        }

        fieldset{
            background-color: #40463E;
        }

        caption

        /* Titre du tableau */
            {
            margin: auto;
            /* Centre le titre du tableau */
            font-family: Arial, Times, "Times New Roman", serif;
            font-weight: bold;
            font-size: 1.2em;
            color: #009900;
            margin-bottom: 20px;
            /* Pour éviter que le titre ne soit trop collé au tableau en-dessous */
        }

        table

        /* Le tableau en lui-même */
            {
            margin: auto;
            /* Centre le tableau */
            border: 4px outset #40463E;
            /* Bordure du tableau avec effet 3D (outset) */
            border-collapse: collapse;
            /* Colle les bordures entre elles */
            width: 100%;
            background-color: white;
        }

        th

        /* Les cellules d'en-tête */
            {
            background-color: #40463E;
            color: white;
            font-size: 1.1em;
            font-family: Arial, "Arial Black", Times, "Times New Roman", serif;
            border: 1px solid grey;
        }

        td

        /* Les cellules normales */
            {
            border: 1px solid black;
            font-family: "Comic Sans MS", "Trebuchet MS", Times, "Times New Roman", serif;
            text-align: center;
            /* Tous les textes des cellules seront centrés*/
            padding: 5px;
            /* Petite marge intérieure aux cellules pour éviter que le texte touche les bordures */
        }

        td.time {
            width: 5%;
        }


    </style>

</head>

<body>
    <div id="title">
        <p> <img src="images/title.png" alt="erreur" width="400" height="100"></p>
    </div><br>

    <form action="RDVthankyou.php" method="post">
        <table>
            <?php
            $MDP = '';

            $activity = isset($_POST["activity"]) ? $_POST["activity"] : ""; //mettre la l'activiter a differencier quand on click



            //avec l'id on recup le coach
            $db_handle = mysqli_connect('localhost:3306/push_n_pool', 'root', $MDP);
            $db_found = mysqli_select_db($db_handle, "push_n_pool");
            if ($db_found) {
                $sql = "SELECT idCoach,idPerson,Office FROM push_n_pool.coach where Activity = '" . $activity . "'";
                $result = mysqli_query($db_handle, $sql);
                $row_cnt = $result->num_rows;
                while ($data = mysqli_fetch_assoc($result)) {
                    $idCoach = $data['idCoach'];
                    $idperson = $data['idPerson'];
                    $office =$data['Office'];
                }
            } else {
                echo "Database not found";
            }
            //echo "</br>id coach = ". $idCoach;

            mysqli_close($db_handle);

            //echo $data;

            if ($row_cnt == 0) {
                header('Location: index.php');
                exit;
            }


            //avec le coach on recup les date dans la tavle crenaux
            $db_handle = mysqli_connect('localhost:3306/push_n_pool', 'root', $MDP);
            $db_found = mysqli_select_db($db_handle, "push_n_pool");
            $idDate = array();

            if ($db_found) {
                $sql = "SELECT idDate FROM push_n_pool.appointments where idCoach = " . $idCoach;
                $result = mysqli_query($db_handle, $sql);

                while ($data = mysqli_fetch_assoc($result)) {
                    $idDate[] = $data['idDate'];
                    //echo "</br>".$data['idDate'];
                }
            } else {
                echo "Database not found";
            }


            mysqli_close($db_handle);

            $DatePrise = array();
            for ($i = 0; $i < count($idDate); $i++) {
                $db_handle = mysqli_connect('localhost:3306/push_n_pool', 'root', $MDP);
                $db_found = mysqli_select_db($db_handle, "push_n_pool");
                if ($db_found) {
                    $sql = "SELECT dateCol FROM push_n_pool.date where idDate = " . $idDate[$i];
                    $result = mysqli_query($db_handle, $sql);

                    while ($data = mysqli_fetch_assoc($result)) {
                        $DatePrise[] = $data['dateCol'];
                    }
                } else {
                    echo "Database not found";
                }
                mysqli_close($db_handle);
            }


            //recup de la BDD les dates en fonction de la semaine
            $semaine = isset($_POST["date1"]) ? $_POST["date1"] : ""; /////////////////////////////ISSET ICI
            $verif = $semaine;
            $semaine = date("W", strtotime($semaine));

            $db_handle = mysqli_connect('localhost:3306/push_n_pool', 'root', $MDP);
            $db_found = mysqli_select_db($db_handle, "push_n_pool");
            $DATE = array();

            if ($db_found) {
                if ($verif != null) {
                    $sql = "SELECT dateCol FROM push_n_pool.date where WEEK(dateCol) = " . $semaine;
                } else {
                    $sql = "SELECT dateCol FROM push_n_pool.date where WEEK(dateCol) = WEEK((SELECT MIN(dateCol) FROM push_n_pool.date ))";
                }
                $result = mysqli_query($db_handle, $sql);

                while ($data = mysqli_fetch_assoc($result)) {
                    $DATE[] = $data['dateCol'];
                    //echo "</br>".$data['dateCol'];
                }
            } else {
                echo "Database not found";
            }
            //echo $IDactivity;
            if ($DATE == null) {
                header('Location: index.php');
                exit;
            }
            mysqli_close($db_handle);

            if ($DatePrise != null) {
                for ($i = 0; $i < count($DATE); $i++) {
                    for ($j = 0; $j < count($DatePrise); $j++) {
                        //echo $DATE[$i]. " " .$idDate[$j];
                        //echo "</br>";
                        if ($DATE[$i] == $DatePrise[$j]) {
                            $DATE[$i] = null;
                            //echo SALUTFDSBHJKLQZREFHSDVJK;
                        }
                    }
                }
            }

            //echo $semaine;
            $jour = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
            $heure = 7;
            echo "<tr><th>Heure</th>";
            for ($x = 0; $x < 13; $x++) {
                echo "<th>" . $heure . "</th>";
                $heure++;
            }

            echo "</tr>";
            $compt = 0;
            for ($i = 0; $i < 6; $i++) {
                echo "<tr>";
                echo "<th>" . $jour[$i] . "</th>";

                for ($j = 0; $j < 13; $j++) {
                    echo "<td>";

                    if ($j == 6 || $j == 7) {
                        echo "Lunch";
                    } else if ($DATE[$compt] == null) {
                        echo "<input type='radio' value = '' name='inputRDV' disabled></br>";
                        echo "Date non Disponible";
                    } else {
                        //echo "<form action = 'priseRDV.php'";
                        echo "<input type='radio' value = '" . $DATE[$compt] . "' name='inputRDV' ></br>"; //disabled
                        //echo "</form>";
                        echo $DATE[$compt];
                    }
                    //echo "teste".$i;

                    $compt++;
                    echo "</td>";
                }
            }
            echo "</tr>";




            $db_handle = mysqli_connect('localhost:3306/push_n_pool', 'root', $MDP);
            $db_found = mysqli_select_db($db_handle, "push_n_pool");
            if ($db_found) {
                $sql = "SELECT * FROM push_n_pool.person where idPerson = " . $idperson;
                $result = mysqli_query($db_handle, $sql);

                while ($data = mysqli_fetch_assoc($result)) {
                    $nom = $data['Name'];
                    $prenom = $data['Surname'];
                    $mail = $data['Email'];
                }
            } else {
                echo "Database not found";
            }
            mysqli_close($db_handle);
            ?>
        </table><br>
        <div id="center">
            <button type="submit" class="btn btn-light">Valider le RDV</button>
            <a href="index.php"><button type="button" class="btn btn-light">Retour accueil</button></a>
        </div><br>
        <fieldset>
          <div id="info">
            <h1>Information concernant le Coach :</h1>
            </br>
            Nom : <?php echo $nom; ?>
            </br>
            Mail : <?php echo $mail; ?>
            </br>
            Prénom : <?php echo $prenom; ?>
            </br>
            Activité : <?php echo $activity ?>
            <br>
            Bureau : <?php echo $office ?>
            <br><br><form action='recupCV.php' method='get'><button type='submit' class='btn btn-light' name='activity' value='<?php echo $activity ?>'>Voir le CV</button></form>
          </div> <br>
        </fieldset>
        
            
    </form>
            
        
        
        
</body>