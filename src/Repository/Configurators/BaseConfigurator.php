<?php

declare(strict_types=1);

namespace Droedex\FF\Repository\Configurators;

use Droedex\FF\Repository\DTO\Interfaces\ParametersDTOInterface;

class BaseConfigurator
{
    protected ParametersDTOInterface $parametersDTO;

    public function __construct(ParametersDTOInterface $parametersDTO)
    {
        $this->parametersDTO = $parametersDTO;
    }
}