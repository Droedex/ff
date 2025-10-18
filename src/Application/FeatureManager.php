<?php

declare(strict_types=1);

namespace Droedex\FF\Application;

use Droedex\FF\FeatureSet\Interfaces\FeatureSetInterface;
use Droedex\FF\Repository\DTO\Interfaces\ResultDTOInterface;

class FeatureManager
{
    private FeatureSetBuilder $featureSetBuilder;

    public function __construct(FeatureSetBuilder $featureSet)
    {
        $this->featureSetBuilder = $featureSet;
    }

    public function getFeatureSet(string $unitName): FeatureSetInterface
    {
        return $this->featureSetBuilder->build($unitName);
    }

//    public function contractExecute(ContractDTO $contract): ResultDTOInterface
//    {
//        $featureSet = $this->getFeatureSet($contract->getUnit());
//
//        return $featureSet->execute($contract->getFeature(), $contract->getData());
//    }
}