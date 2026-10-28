<?php

spl_autoload_register(function ($nombreClase) {
    // 1. Quitamos el namespace base para quedarnos con el nombre de la clase
    $clase = str_replace('Dwes\\AlquilerMovilidad\\Model\\', '', $nombreClase);

    // 2. Apuntamos a la carpeta app/model/
    $ruta = __DIR__ . '/../app/model/' . $clase . '.php';

    // 3. Sustituimos las barras para Mac / UNIX
    $ruta = str_replace('\\', '/', $ruta);

    // 4. Si existe el archivo, lo incluimos
    if (file_exists($ruta)) {
        include_once $ruta;
    }
});