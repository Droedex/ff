<?php

declare(strict_types=1);

namespace Droedex\FF\FeatureSet;

use Droedex\FF\FeatureSet\Interfaces\FeatureInterface;
use Droedex\FF\Repository\Configurators\CreateConfigurator;
use Droedex\FF\Repository\DTO\Interfaces\ParametersDTOInterface;
use Droedex\FF\Repository\DTO\Interfaces\ResultDTOInterface;

class FeatureCreate extends BaseFeature implements FeatureInterface
{
    public function execute(ParametersDTOInterface $queryParametersDTO): ResultDTOInterface
    {
        $selectQuery = new CreateConfigurator($queryParametersDTO);

        return $this->repository->create($selectQuery);
    }
}