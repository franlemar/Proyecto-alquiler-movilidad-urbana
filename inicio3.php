<?php
include_once "AlquilerMovilidad.php"; // No incluimos nada más

$am = new AlquilerMovilidad("Severo 8A");

//voy a incluir unos cuantos vehículos de prueba
$am->incluirCocheElectrico("Tesla Model 3", 19.99, "Tesla Model 3", 5, 5);
$am->incluirCocheElectrico("Nissan Leaf", 49.99, "Nissan Leaf", 5, 5);
$am->incluirBicicletaElectrica("Orbea Vibe", 4.5, 3, "Urbana");
$am->incluirBicicletaElectrica("Specialized Turbo", 4.5, 7, "Mixta");
$am->incluirPatinete("Ninebot Max", 3, 65);
$am->incluirPatinete("Xiaomi Pro 2", 3.5, 45);

//listo los vehículos
$am->listarVehiculos();

//voy a crear algunos socios
$am->incluirSocio("Amancio Ortega");
$am->incluirSocio("Pablo Picasso", 2);

$am->alquilarClienteVehiculo(1,2);
$am->alquilarClienteVehiculo(1,3);
//alquilo otra vez el vehículo 2 al socio 1.
// no debe dejarme porque ya lo tiene alquilado
$am->alquilarClienteVehiculo(1,2);
//alquilo el vehículo 6 al socio 1.
//no se puede porque el socio 1 tiene 2 alquileres como máximo
$am->alquilarClienteVehiculo(1,6);

//listo los socios
$am->listarSocios();