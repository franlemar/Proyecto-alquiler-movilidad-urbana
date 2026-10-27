<?php

class Patinete extends Vehiculo
{
    public function __construct(
        string      $titulo,
        int         $numero,
        float       $precio,
        private int $autonomiaKm,
        private int $velocidadMaxkMh = 0
    )
    {
        parent::__construct($titulo, $numero, $precio);
    }

    public function muestraResumen(): void
    {
        parent::muestraResumen();
        echo "Autonomía en Km: " . $this->autonomiaKm . "km <br>" .
            "Velocidad máx. en km/h: " . $this->velocidadMaxkMh . "km/h <br>";

    }


}
