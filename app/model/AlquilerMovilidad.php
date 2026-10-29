<?php

namespace Dwes\AlquilerMovilidad\Model;

class AlquilerMovilidad
{


    public function __construct(
        private string $direccion,
        /** @var Vehiculo[] */
        private array  $vehiculos = [],
        /** @var Cliente[] */
        private array  $clientes = [],
        private int    $indiceCliente = 0,

        private int    $indiceVehiculo = 0
)
{
}

private
function incluirVehiculo(Vehiculo $v): void
{
    $this->vehiculos[] = $v;
    echo "<br>" . $v->titulo . " añadido correctamente";
}

private
function buscaCliente(int $numCliente): Cliente|null
{
    foreach ($this->clientes as $cliente) {
        if ($cliente->getNumero() === $numCliente) {
            return $cliente;
        }
    }
    return null;
}

private
function buscaVehiculo(int $numVehiculo): Vehiculo|null
{
    foreach ($this->vehiculos as $vehiculo) {
        if ($vehiculo->getNumero() === $numVehiculo) {
            return $vehiculo;
        }
    }
    return null;
}

public
function incluirPatinete(
    string $titulo,
    float  $precio,
    int    $autonomiaKm): void
{
    $this->indiceVehiculo++;
    $nuevoPatinete = new Patinete($titulo, $this->indiceVehiculo, $precio, $autonomiaKm);

    $this->incluirVehiculo($nuevoPatinete);
}

public
function incluirBicicletaElectrica(
    string $titulo,
    float  $precio,
    int    $marchas,
    string $tipo): void
{
    $this->indiceVehiculo++;
    $nuevaBicicletaElectrica = new BicicletaElectrica($titulo, $this->indiceVehiculo, $precio, $marchas, $tipo);

    $this->incluirVehiculo($nuevaBicicletaElectrica);
}

public
function incluirCocheElectrico(
    string $titulo,
    float  $precio,
    string $marcaModelo,
    int    $plazasMin,
    int    $plazasMax): void
{
    $this->indiceVehiculo++;
    $nuevoCocheElectrico = new CocheElectrico($titulo, $this->indiceVehiculo, $precio, $marcaModelo, $plazasMin, $plazasMax);

    $this->incluirVehiculo($nuevoCocheElectrico);
}

public
function listarVehiculos(): void
{
    echo "<p><strong>--- LISTA DE VEHÍCULOS ---</strong></p>";
    foreach ($this->vehiculos as $vehiculo) {
        $vehiculo->muestraResumen();
        echo "<br>";
    }
}

public
function incluirCliente(
    string $nombre,
    int    $maxAlquilerConcurrente = 3): void
{
    $this->indiceCliente++;
    $nuevoCliente = new Cliente($nombre, $this->indiceCliente, $maxAlquilerConcurrente);

    $this->clientes[] = $nuevoCliente;
    echo "<br>Cliente " . $nombre . " añadido correctamente.";
}

public
function listarClientes(): void
{
    echo "<p><strong>--- LISTA DE CLIENTES ---</strong></p>";
    foreach ($this->clientes as $cliente) {
        $cliente->muestraResumen();
        echo "<br>";
    }
}

public
function alquilarClienteVehiculo(
    int $numCliente,
    int $numVehiculo
): self
{

    //Busco el cliente
    $clienteEncontrado = $this->buscaCliente($numCliente);
    if ($clienteEncontrado === null) {
        echo "<br>No se puede alquilar: el cliente con número " . $numCliente . " no existe.";
        return $this;
    }

    //Busco el vehículo
    $vehiculoEncontrado = $this->buscaVehiculo($numVehiculo);
    if ($vehiculoEncontrado === null) {
        echo "<br>No se puede alquilar: el vehículo con número" . $numVehiculo . "no existe.";
        return $this;
    }

    $clienteEncontrado->alquilar($vehiculoEncontrado);
    return $this;
}
}
