<?php

namespace App\Exceptions;

class BlocoNaoExiste extends \Exception{
    public function __construct(
        $message = 'O nome do bloco não existe ou foi digitado incorretamente',
        $code = 0,
        \Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}

?>