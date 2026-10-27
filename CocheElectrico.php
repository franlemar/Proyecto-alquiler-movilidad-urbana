<?php

class CocheElectrico extends Vehiculo{

    public function __construct(
        string $titulo,
        int $numero,
        float $precio,
        private string $marcaModelo,
        private int $plazasMin,
        private int $plazasMax
    ){
        parent::__construct($titulo, $numero, $precio);
    }

    public function muestraInfoPlazas(): void{
        switch (true){
            case $this->plazasMin == 1 && $this->plazasMax < 2:
                echo "Para un pasajero";
                break;

            case $this->plazasMin > 2 && $this->plazasMax <= 5:
                echo "De " . $this->plazasMin . " a " . $this->plazasMax . " pasajeros";
                break;

            case $this->plazasMin > 2 && $this->plazasMax > 5:
                echo "Para " . $this->plazasMax . " pasajeros";
                break;
        }
    }

    public function muestraResumen(): void{
        parent::muestraResumen();
        echo "Marca/modelo: " . $this->marcaModelo . "<br>" .
            "Número de plazas mínimas: " . $this->plazasMin . "km/h <br>" .
            "Número de plazas máximas: " . $this->plazasMax . "km/h <br>";

    }

}
