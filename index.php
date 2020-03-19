<?php

date_default_timezone_set('Europe/Paris');
require_once './functions/classAutoLoader.php';
spl_autoload_register('classAutoloader');

$valeurs = array(
    'nom' => 'Michel',
    'prenom' => 'Jean-Pierre',
    'email' => 'jp@michel.com',
    'password' => 'michel a la plage'
);

/* On instancie un objet de la classe Requete
$test = new Requete();
$test->inserer('table', $valeurs);*/

$truc = new FormulaireInscription('envoi.php', 'test', 'contact', 'contact');
var_dump($truc);