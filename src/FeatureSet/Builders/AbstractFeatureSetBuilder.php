<?php

declare(strict_types=1);

namespace Droedex\FF\FeatureSet\Builders;

use Droedex\FF\FeatureSet\Interfaces\FeatureInterface;
use Droedex\FF\Repository\DTO\Interfaces\ResultDTOInterface;

abstract class AbstractFeatureSetBuilder
{
    abstract public function build(): FeatureInterface;

    public function handle(): ResultDTOInterface
    {
        $feature = $this->build();

        return $feature->execute();
    }
}