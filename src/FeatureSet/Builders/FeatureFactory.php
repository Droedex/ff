<?php

declare(strict_types=1);

namespace Droedex\FF\FeatureSet\Builders;

use Droedex\FF\Enums\FeaturesEnum;
use Droedex\FF\FeatureSet\Interfaces\FeatureInterface;
use Droedex\FF\Repository\Interfaces\RepositoryInterface;

class FeatureFactory
{
    public function make(FeaturesEnum $feature, RepositoryInterface $repository): FeatureInterface
    {
        $featureClassName = $feature->getClassName();

        return new $featureClassName($repository);
    }
}