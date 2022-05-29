<?php
//que Lucas(moi) doit utiliser ca
$repos = 'Projet/';

$mail = isset($_POST["mail"])? $_POST["mail"] : "";
$num = isset($_POST["telephone"])? $_POST["telephone"] : "";
$age = isset($_POST["age"])? $_POST["age"] : "";
$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$formation = isset($_POST["Formation"])? $_POST["Formation"] : "";
$experience = isset($_POST["Experience"])? $_POST["Experience"] : "";

$xml = new XMLWriter();
$xml->openURI(__DIR__."/".$mail.".xml");
$xml->startDocument('1.0', 'utf-8');
$xml->startElement('CV');
$xml->writeElement('mail', $mail);
$xml->writeElement('nom', $nom);
$xml->writeElement('telephone', $num);
$xml->writeElement('age', $age);
$xml->writeElement('formation', $formation);
$xml->writeElement('experience', $experience);
$xml->endElement();
$xml->flush();

header('Location: index.php');
exit();

?>