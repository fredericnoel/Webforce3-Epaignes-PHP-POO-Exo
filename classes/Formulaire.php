<?php


abstract class Formulaire
{
    protected $action;
    protected $method = 'post';
    protected $uploadFile = false;
    protected $id;
    protected $class;
    protected $enctype;

    public function __construct(string $url, string $fichier, string $idFormulaire, string $classFormulaire)
    {
        $path = './conf/' . $fichier . '.ini';
        $fileData = parse_ini_file($path, true);
        var_dump($fileData);
    }
}