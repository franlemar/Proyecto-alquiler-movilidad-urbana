<?php
include_once "Resumible.php";

abstract class Vehiculo implements Resumible
{

    const float IVA = 0.21;

    public function __construct(
        public string $titulo,
        private int   $numero,
        private float $precio,
    )
    {
    }

    public function getNumero(): int
    {
        return $this->numero;
    }

    public function getPrecio(): float
    {
        return $this->precio;
    }

    public function getPrecioConIVA(): float
    {
        return ($this->precio * self::IVA) + $this->precio;
    }

    public function muestraResumen(): void
    {
        echo "Producto: " . $this->titulo . "<br>" .
            "Precio sin IVA: " . $this->precio . "€ <br>" .
            "Precio con IVA: " . $this->getPrecioConIVA() . "€ <br>";
    }
}
