<?php

declare(strict_types=1);

namespace Droedex\FF\FeatureSet;

use Droedex\FF\FeatureSet\Interfaces\FeatureInterface;
use Droedex\FF\Repository\DTO\Interfaces\RequestDTOInterface;
use Droedex\FF\Repository\DTO\Interfaces\ResultDTOInterface;

class FeatureDelete extends BaseFeature implements FeatureInterface
{
    public function execute(RequestDTOInterface $dataDTO): ResultDTOInterface
    {
        return $this->repository->delete($dataDTO);
    }
}