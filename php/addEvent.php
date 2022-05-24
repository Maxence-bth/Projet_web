<?php

$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];
echo "----" . $title . "<br>" . $start . "<br>" . $end;
/* 
// connexion à la base de données
 try {
 $bdd = new PDO('mysql:host=localhost;dbname=fullcalendar', 'root', '');
 } catch(Exception $e) {
 exit('Impossible de se connecter à la base de données.');
 }
 
$sql = "INSERT INTO evenement (title, start, end) VALUES (:title, :start, :end)";
$q = $bdd->prepare($sql);
$q->execute(array(':title'=>$title, ':start'=>$start, ':end'=>$end));
*/