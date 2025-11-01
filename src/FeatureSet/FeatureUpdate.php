<?php

declare(strict_types=1);

namespace Droedex\FF\FeatureSet;

use Droedex\FF\FeatureSet\Interfaces\FeatureInterface;
use Droedex\FF\Repository\DTO\Interfaces\ParametersDTOInterface;
use Droedex\FF\Repository\DTO\Interfaces\ResultDTOInterface;
use Droedex\FF\Repository\Eloquent\Configurators\UpdateConfigurator;

class FeatureUpdate extends BaseFeature implements FeatureInterface
{
    /**
     * @throws \Exception
     */
    public function execute(array $data): ResultDTOInterface
    {
        $commandConfigurator = new UpdateConfigurator();

        return $this->repository->update($commandConfigurator,$data);
    }
}