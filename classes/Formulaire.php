<?php


abstract class Formulaire
{
    protected $action;
    protected $method = 'post';
    protected $id;
    protected $class;
    protected $enctype;

    public function __construct(string $fichier)
    {
        $path = './conf/' . $fichier . '.ini';
        $fileData = parse_ini_file($path);
    }
}