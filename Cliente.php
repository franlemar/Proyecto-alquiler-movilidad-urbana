<?php

class Cliente
{

    public function __construct(
        private string $nombre,
        private int    $numero,
        private int    $maxAlquilerConcurrente = 3,
        private int    $numVehiculosAlquilados = 0,
        private array  $vehiculosAlquilados = []
    )
    {
    }

    public function getNumero(): int
    {
        return $this->numero;
    }

    public function setNumero(int $num)
    {
        $this->numero = $num;
    }

    public function getNumVehiculosAlquilados(): int
    {
        return $this->numVehiculosAlquilados;
    }

    public function tieneAlquilado(Vehiculo $v): bool
    {
        foreach ($this->vehiculosAlquilados as $vehiculo) {
            if ($vehiculo === $v) {
                return true;
            }
        }
        return false;
    }

    public function alquilar(Vehiculo $v): bool
    {
        if ($this->tieneAlquilado($v)) {
            echo "<br>Ya tiene este vehículo alquilado, o ha superado el máximo de vehículos alquilados permitidos";
            return false;
        }

        if (count($this->vehiculosAlquilados) >= $this->maxAlquilerConcurrente) {
            echo "<br>Ha superado el máximo de vehículos alquilados permitidos";
            return false;
        }

        $this->vehiculosAlquilados[] = $v;
        $this->numVehiculosAlquilados++;
        echo "<br>Se ha realizado el alquiler del vehículo correctamente. Se almacenará dicho alquiler en su historial";
        return true;
    }

    public function devolver(int $numVehiculo): bool{
        foreach ($this->vehiculosAlquilados as $indice => $vehiculo){
            if($vehiculo->getNumero() === $numVehiculo){
                unset($this->vehiculosAlquilados[$indice]);

                echo "<br>El vehículo con número " . $numVehiculo . " se ha devuelto correctamente";
                return true;
            }
        }
        echo "<br>No se ha podido devolver el vehículo con número " . $numVehiculo;
        return false;
    }

    public function listaAlquileres():void{
        echo "<br>Este cliente tiene actualemnte " . count($this->vehiculosAlquilados) . " vehículos alquilados";
        echo "<br>A continuación, se muestra un resumen de cada vehículo alquilado:<br>";

        foreach ($this->vehiculosAlquilados as $vehiculo){
            $vehiculo->muestraResumen();
        }

    }


    public function muestraResumen(): void
    {
        echo "Nombre del cliente: " . $this->nombre . "\n" .
            "Cantidad de vehículos alquilados: " . count($this->vehiculosAlquilados);
    }

}
