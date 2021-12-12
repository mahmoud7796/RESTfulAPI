<?php

namespace App\Exceptions;

use App\Traits\ResponseJson;
use Exception;

class NotFoundException extends Exception
{
    use ResponseJson;
    public function render()
    {
        return $this-> jsonResponse('Request Not Found','data',404,'Request Not Found');
    }
}
