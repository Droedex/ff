<?php

declare(strict_types=1);

namespace Droedex\FF\Application;

use Droedex\FF\FeatureSet\Interfaces\FeatureSetInterface;
use Droedex\FF\Repository\DTO\ParametersDTO;

class FeatureManager
{
    private FeatureSetBuilder $featureSetBuilder;

    public function __construct(FeatureSetBuilder $featureSet)
    {
        $this->featureSetBuilder = $featureSet;
    }

    public function getFeatureSet(ParametersDTO $parameters): FeatureSetInterface
    {
        return $this->featureSetBuilder->build($parameters);
    }

//    public function contractExecute(ContractDTO $contract): ResultDTOInterface
//    {
//        $featureSet = $this->getFeatureSet($contract->getUnit());
//
//        return $featureSet->execute($contract->getFeature(), $contract->getData());
//    }
}