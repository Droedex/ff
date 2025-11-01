<?php

declare(strict_types=1);

namespace Droedex\FF\FeatureSet;

use Droedex\FF\FeatureSet\Interfaces\FeatureInterface;
use Droedex\FF\Repository\DTO\Interfaces\ParametersDTOInterface;
use Droedex\FF\Repository\DTO\Interfaces\ResultDTOInterface;
use Droedex\FF\Repository\Eloquent\Configurators\DeleteConfigurator;

class FeatureDelete extends BaseFeature implements FeatureInterface
{
    public function execute(array $data = []): ResultDTOInterface
    {
        $selectQuery = new DeleteConfigurator();

        return $this->repository->delete($selectQuery);
    }
}