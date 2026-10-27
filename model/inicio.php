<?php
include "Vehiculo.php";

$vehiculo1 = new Vehiculo("Patinete Xiaomi Pro 2", 22, 3);
echo "<strong>" . $vehiculo1->titulo . "</strong>";
echo "<br>Precio: " . $vehiculo1->getPrecio() . " euros";
echo "<br>Precio IVA incluido: " . $vehiculo1->getPrecioConIVA() . " euros";
echo "<br>" . $vehiculo1->muestraResumen();

include "Patinete.php";

$miPatinete = new Patinete("Patinete Xiaomi Mi Electric Pro 2", 23, 3.5, 45);
echo "<strong>" . $miPatinete->titulo . "</strong>";
echo "<br>Precio: " . $miPatinete->getPrecio() . " euros";
echo "<br>Precio IVA incluido: " . $miPatinete->getPrecioConIva() . " euros";
echo "<br>" . $miPatinete->muestraResumen();