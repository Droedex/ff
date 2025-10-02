<?php

namespace Droedex\FF\FeatureSet\Interfaces;

use Droedex\FF\Repository\DTO\Interfaces\RequestDTOInterface;
use Droedex\FF\Repository\DTO\Interfaces\ResultDTOInterface;

interface FeatureInterface
{
    public function execute(RequestDTOInterface $dataDTO): ResultDTOInterface;
}