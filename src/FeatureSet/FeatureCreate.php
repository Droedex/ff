<?php

declare(strict_types=1);

namespace Droedex\FF\FeatureSet;

use Droedex\FF\FeatureSet\Interfaces\FeatureInterface;
use Droedex\FF\Repository\DTO\Interfaces\ResultDTOInterface;
use Droedex\FF\Repository\Eloquent\Configurators\CreateConfigurator;

class FeatureCreate extends BaseFeature implements FeatureInterface
{
    /**
     * @inheritDoc
     */
    public function execute(array $data): ResultDTOInterface
    {
        $configurator = new CreateConfigurator();

        return $this->repository->create($configurator, $data);
    }
}