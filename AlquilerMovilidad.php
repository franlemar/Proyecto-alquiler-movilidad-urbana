<?php

include_once "Vehiculo.php";
include_once "Patinete.php";
include_once "BicicletaElectrica.php";
include_once "CocheElectrico.php";
include_once "Cliente.php";

class AlquilerMovilidad
{
    private static int $indiceCliente = 0;
    private static int $indiceVehiculo = 0;


    public function __construct(
        private string $direccion,
        /** @var Vehiculo[] */
        private array  $vehiculos = [],
        /** @var Cliente[] */
        private array  $socios = [],
    )
    {
    }

    private function incluirVehiculo(Vehiculo $v): void
    {
        $this->vehiculos[] = $v;
        echo "<br>" . $v->titulo . " añadido correctamente";
    }

    private function buscaCliente(int $numCliente): Cliente|null
    {
        foreach ($this->socios as $socio) {
            if ($socio->getNumero() === $numCliente) {
                return $socio;
            }
        }
        return null;
    }

    private function buscaVehiculo(int $numVehiculo): Vehiculo|null{
        foreach ($this->vehiculos as $vehiculo) {
            if ($vehiculo->getNumero() === $numVehiculo) {
                return $vehiculo;
            }
        }
        return null;
    }

    public function incluirPatinete(
        string $titulo,
        float  $precio,
        int    $autonomiaKm): void
    {
        self::$indiceVehiculo++;
        $nuevoPatinete = new Patinete($titulo, self::$indiceVehiculo, $precio, $autonomiaKm);

        $this->incluirVehiculo($nuevoPatinete);
    }

    public function incluirBicicletaElectrica(
        string $titulo,
        float  $precio,
        int    $marchas,
        string $tipo): void
    {
        self::$indiceVehiculo++;
        $nuevaBicicletaElectrica = new BicicletaElectrica($titulo, self::$indiceVehiculo, $precio, $marchas, $tipo);

        $this->incluirVehiculo($nuevaBicicletaElectrica);
    }

    public function incluirCocheElectrico(
        string $titulo,
        float  $precio,
        string $marcaModelo,
        int    $plazasMin,
        int    $plazasMax): void
    {
        self::$indiceVehiculo++;
        $nuevoCocheElectrico = new CocheElectrico($titulo, self::$indiceVehiculo, $precio, $marcaModelo, $plazasMin, $plazasMax);

        $this->incluirVehiculo($nuevoCocheElectrico);
    }

    public function listarVehiculos(): void
    {
        echo "<p><strong>--- LISTA DE VEHÍCULOS ---</strong></p>";
        foreach ($this->vehiculos as $vehiculo) {
            $vehiculo->muestraResumen();
            echo "<br>";
        }
    }

    public function incluirSocio(
        string $nombre,
        int    $maxAlquilerConcurrente = 3): void
    {
        self::$indiceSocio++;
        $nuevoSocio = new Cliente($nombre, self::$indiceSocio, $maxAlquilerConcurrente);

        $this->socios[] = $nuevoSocio;
        echo "<br>Socio " . $nombre . " añadido correctamente.";
    }

    public function listarSocios(): void
    {
        echo "<p><strong>--- LISTA DE SOCIOS ---</strong></p>";
        foreach ($this->socios as $socio) {
            $socio->muestraResumen();
            echo "<br>";
        }
    }

    public function alquilarClienteVehiculo(
        int $numCliente,
        int $numVehiculo
    ): void
    {

        //Busco el socio
        $socioEncontrado = $this->buscaCliente($numCliente);
        if ($socioEncontrado === null) {
            echo "<br>No se puede alquilar: el socio con número " . $numCliente . " no existe.";
            return;
        }

        //Busco el vehículo
        $vehiculoEncontrado = $this->buscaVehiculo($numVehiculo);
        if ($vehiculoEncontrado === null) {
            echo "<br>No se puede alquilar: el vehículo con número" . $numVehiculo . "no existe.";
            return;
        }

        $socioEncontrado->alquilar($vehiculoEncontrado);
    }
}
