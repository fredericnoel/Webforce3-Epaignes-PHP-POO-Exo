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

var_dump($valeurs);