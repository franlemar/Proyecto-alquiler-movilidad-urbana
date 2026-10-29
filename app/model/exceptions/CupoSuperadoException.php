<?php

namespace Dwes\AlquilerMovilidad\Model\Exceptions;

use Exception;
use Throwable;

class CupoSuperadoException extends AlquilerMovilidadException
{

    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}