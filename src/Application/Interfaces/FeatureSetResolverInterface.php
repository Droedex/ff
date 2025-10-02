<?php

namespace Droedex\FF\Application\Interfaces;

use Droedex\FF\FeatureSet\Interfaces\FeatureSetInterface;

interface FeatureSetResolverInterface
{
    public function resolve(string $unitName): FeatureSetInterface;
}