<?php

namespace Droedex\FF\FeatureSet\Interfaces;

use Droedex\FF\Repository\DTO\Interfaces\ParametersDTOInterface;
use Droedex\FF\Repository\DTO\Interfaces\ResultDTOInterface;
use Exception;

interface FeatureInterface
{
    /**
     * @throws Exception
     */
    public function execute(array $data): ResultDTOInterface;
}