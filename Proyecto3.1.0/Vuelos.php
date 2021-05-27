<?php
//creamos clase sencilla para los vuelos
class Vuelo
{
//propiedades
// como se trata de una clase de paso,
//es decir, solo servirá como una clase contenedora
// necesitamos que las propiedades sean públicas
public $Id;
public $Origin;
public $Destination;
public $Duration;
//constructor
public function __construct(string $nom, string $Origin, string $Destination, string $Duration)
{
$this->Id = $nom;
$this->Origin = $Origin;
$this->Destination = $Destination;
$this->Duration = $Duration;
}
//no necesitamos getters ni setters
}