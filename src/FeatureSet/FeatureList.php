<?php

declare(strict_types=1);

namespace Droedex\FF\FeatureSet;

use Droedex\FF\FeatureSet\Interfaces\FeatureInterface;
use Droedex\FF\Repository\Configurators\ListConfigurator;
use Droedex\FF\Repository\DTO\Interfaces\ParametersDTOInterface;
use Droedex\FF\Repository\DTO\Interfaces\RequestDTOInterface;
use Droedex\FF\Repository\DTO\Interfaces\ResultDTOInterface;

class FeatureList extends BaseFeature implements FeatureInterface
{
    public function execute(ParametersDTOInterface $queryParametersDTO): ResultDTOInterface
    {
        $selectQuery = new ListConfigurator($queryParametersDTO);

        return $this->repository->List( $selectQuery);
    }
}