<?php

declare(strict_types=1);

namespace Droedex\FF\Application;

use Droedex\FF\Application\Interfaces\FeatureSetResolverInterface;
use Droedex\FF\Application\FeatureSetBuilder;
use Droedex\FF\FeatureSet\Interfaces\FeatureSetInterface;

class FeatureSetResolver implements FeatureSetResolverInterface
{
    private FeatureSetBuilder $featureSetBuilder;

    public function __construct(FeatureSetBuilder $featureSet)
    {
        $this->featureSetBuilder = $featureSet;
    }

    public function resolve(string $unitName): FeatureSetInterface
    {
        return $this->featureSetBuilder->build();
    }
}