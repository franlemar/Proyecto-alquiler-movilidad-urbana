<?php

namespace Dwes\AlquilerMovilidad\Model;

use Dwes\AlquilerMovilidad\Model\Exceptions\AlquilerMovilidadException;
use Dwes\AlquilerMovilidad\Model\Exceptions\CupoSuperadoException;
use Dwes\AlquilerMovilidad\Model\Exceptions\VehiculoYaAlquiladoException;

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
//        foreach ($this->vehiculosAlquilados as $vehiculo) {
//            if ($vehiculo === $v) {
//                return true;
//            }
//        }
//        return false;

        return in_array($v, $this->vehiculosAlquilados, true);
    }

    public function alquilar(Vehiculo $v): self
    {
        if ($this->tieneAlquilado($v)) {
            throw new VehiculoYaAlquiladoException("El cliente " . $this->nombre . " ya tiene este vehículo alquilado");
        }

        if (count($this->vehiculosAlquilados) >= $this->maxAlquilerConcurrente) {
            throw new CupoSuperadoException("El cliente " . $this->nombre . " ha superado el máximo de vehículos alquilados permitidos");
        }

        $this->vehiculosAlquilados[] = $v;
        $this->numVehiculosAlquilados++;
        echo "<br>Se ha realizado el alquiler del vehículo correctamente. Se almacenará dicho alquiler en el historial del cliente: " . $this->nombre;
        return $this;
    }

    public function devolver(int $numVehiculo): self
    {
        foreach ($this->vehiculosAlquilados as $indice => $vehiculo) {
            if ($vehiculo->getNumero() === $numVehiculo) {
                //Unset en este caso dejaría el hueco vacío en un array secuencial. Mejor Splice()
                array_splice($this->vehiculosAlquilados, $indice, 1);
                $this->numVehiculosAlquilados--;

                echo "<br>El vehículo con número " . $numVehiculo . " se ha devuelto correctamente";
                return $this;
            }
        }
        throw new AlquilerMovilidadException("No se ha podido devolver el vehículo con número " . $numVehiculo);
    }

    public function listaAlquileres(): void
    {
        echo "<br>Este cliente tiene actualemnte " . count($this->vehiculosAlquilados) . " vehículos alquilados";
        echo "<br>A continuación, se muestra un resumen de cada vehículo alquilado:<br>";

        foreach ($this->vehiculosAlquilados as $vehiculo) {
            $vehiculo->muestraResumen();
        }
    }

    public function muestraResumen(): void
    {
        echo "Nombre del cliente: " . $this->nombre . "<br>" .
            "Cantidad de vehículos alquilados: " . count($this->vehiculosAlquilados) . "<br>";
    }

}
