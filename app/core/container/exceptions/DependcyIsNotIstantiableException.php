<?php

declare(strict_types=1);

namespace App\Core\Container\Exceptions;

use App\Core\Container\ContainerInterface;
use App\Core\Container\ContainerExceptionInterface;

use Exception;

class DependcyIsNotIstantiableException extends Exception implements ContainerExceptionInterface{

 

}