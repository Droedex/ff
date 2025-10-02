<?php

declare(strict_types=1);

namespace Droedex\FF\FeatureSet\Builders;

use Droedex\FF\FeatureSet\FeatureCreate;
use Droedex\FF\FeatureSet\Interfaces\FeatureInterface;

class CreateFeatureBuilder extends AbstractFeatureSetBuilder
{
    public function build(): FeatureInterface
    {
        return new FeatureCreate();
    }
}