<?php


abstract class Formulaire
{
    protected $action;
    protected $method = 'post';
    protected $uploadFile = false;
    protected $id;
    protected $class;
    private $data;

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
        $this->uploadFile = $modeEnvoiFrm;
    }

    public function displayForm(): string
    {
        // J'écris ma balise <form> avec tous mes attributs
        $html = '<form ';
        $html .= 'method="' . $this->method . '" ';
        $html .= 'action="' . $this->action . '" ';
        $html .= 'id=' . $this->id . '" ';
        $html .= 'class=' . $this->class . '"';
        if ($this->uploadFile) {
            $html .= ' enctype"multipart/form-data"';
        }
        $html .= '>';

        // Maintenant, je récupère le tableau renvoyé par la fonction de parsing
        foreach ($this->data as $key => $value) {
            // $key me renvoie le contenu qu'il y a entre crochets dans mon fichier .ini
            $typeBalise = explode(":", $key);

            // Je check va contenue de ma chaîne de caractères, je sais que ce qu'il y a avant a l'indice 0
            if ($typeBalise[0] === 'input') {
                // Et je teste le contenu de mon fichier ini (j'affiche en fonction des propriétés que j'ai indiquées)
                if (isset($this->data[$key]['labelContent'])) {
                    $html .= '<div>';
                    $html .= '<label for="' .
                        $typeBalise[1] . '">' .
                        ucfirst($typeBalise[1]) . " : " .
                        '</label>';
                }

                if ($this->data[$key]['type'] === 'submit' || $this->data[$key]['type'] === 'reset') {
                    $html .= '<input type="' . $this->data[$key]['type'] . '" ' .
                            'value="' . $this->data[$key]['value'] . '" />';
                }

                else {
                    $html .= '<input type="' .
                        $this->data[$key]['type'] . '" ' .
                        'id="' . $typeBalise[1] . '" ' .
                        'name="' . $typeBalise[1] . '" ' .
                        'placeholder="Veuillez saisir votre ' . $typeBalise[1] . '"' .
                        ' />';
                }
            }
        }

        $html .= '</form>';
        return $html;
    }
}