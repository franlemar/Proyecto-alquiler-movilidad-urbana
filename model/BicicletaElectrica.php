<?php

class BicicletaElectrica extends Vehiculo{

    public function __construct(
        string $titulo,
        int $numero,
        float $precio,
        private int $marchas,
        private string $tipo
    ){
        parent::__construct($titulo, $numero, $precio);
    }

    public function muestraResumen(): void
    {
        parent::muestraResumen();
        echo "Marchas: " . $this->marchas . "<br>" .
            "Tipo: " . $this->tipo . "<br>";

    }
}
