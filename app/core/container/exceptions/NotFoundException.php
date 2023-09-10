<?php

declare(strict_types=1);

namespace App\Core\Container\Exceptions;

use App\Core\Container\ContainerInterface;
use App\Core\Container\NotFoundExceptionInterface;

use Exception;

class NotFoundException extends Exception implements NotFoundExceptionInterface
{

      
     
}