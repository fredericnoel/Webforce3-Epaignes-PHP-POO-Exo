<?php

class Log
{
    /* Le mot-clé 'static' précise que l'on peut appeler
    * cette méthode sans instancier d'objet
    */
    static public function logWrite(string $data)
    {
        // Penser à créer un répertoire logs à la racine
        $directory = '/logs/';

        //if (!is_dir('logs'))
        //    mkdir('logs');

        /* Je définis le nom de mon fichier
        * Un fichier par jour
        */
        $file = date('Y-m-d') . '.log';

        // Définition du chemin depuis la racine serveur
        $path = dirname(__DIR__) . $directory .$file;

        // Concaténation du msg d'erreur avec heure
        $data = date('H:i:s') . ' - ' . $data;

        // Création d'un handler après ouverture fichier
        $handle = fopen($path, "a");

        if (flock($handle, LOCK_EX)) {
            fwrite($handle, $data . PHP_EOL);
            flock($handle, LOCK_UN);
        }
        fclose($handle);
    }

}