<?php

namespace Dwes\AlquilerMovilidad\Model\Exceptions;

use Throwable;

class VehiculoYaAlquiladoException extends AlquilerMovilidadException
{

    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}
