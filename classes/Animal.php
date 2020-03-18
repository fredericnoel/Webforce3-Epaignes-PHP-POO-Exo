<?php

abstract class Animal implements Biologie
{
    protected string $regne = 'animal';
    protected float $taille;
    protected float $masse;
    protected string $typeRespiration;
    protected float $consommationO2;
    protected float $rejetCO2;

    protected function respirer(string $typeR, float $conso, float $rejet)
    {
        $this->typeRespiration = $typeR;
        $this->consommationO2 = $conso;
        $this->rejetCO2 = $rejet;
    }
}
