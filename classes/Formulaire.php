<?php


abstract class Formulaire
{
    protected $action;
    protected $method = 'post';
    protected $uploadFile = false;
    protected $id;
    protected $class;
    protected $enctype;
    protected $data;

    public function __construct(string $url, string $fichier, string $idFormulaire, string $classFormulaire, bool $modeEnvoiFrm = false)
    {
        // Récupération du paramètre $url pour attribut action
        $this->action = $url;

        // Paramètre indiquant quel fichier de conf utiliser
        $path = './conf/' . $fichier . '.ini';
        $this->data = parse_ini_file($path, true);

        // id du formulaire
        $this->id = $idFormulaire;

        // classe CSS du formulaire
        $this->class = $classFormulaire;

        // dans le cas où le formulaire permettrait l'envoi de fichier
        $this->enctype = $modeEnvoiFrm;
    }
}