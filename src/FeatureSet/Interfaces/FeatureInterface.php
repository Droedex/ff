<?php

namespace Droedex\FF\FeatureSet\Interfaces;

use Droedex\FF\Repository\DTO\Interfaces\ParametersDTOInterface;
use Droedex\FF\Repository\DTO\Interfaces\ResultDTOInterface;

interface FeatureInterface
{
    public function execute(ParametersDTOInterface $queryParametersDTO): ResultDTOInterface;
}