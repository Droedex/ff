<?php

namespace Droedex\FF\FeatureSet\Interfaces;

use Droedex\FF\Enums\FeaturesEnum;
use Droedex\FF\Repository\DTO\Interfaces\RequestDTOInterface;
use Droedex\FF\Repository\DTO\Interfaces\ResultDTOInterface;

interface FeatureSetInterface
{
    public function execute(FeaturesEnum $feature, RequestDTOInterface $requestDTO): ResultDTOInterface;
    public function create(RequestDTOInterface $requestDTO): ResultDTOInterface;
    public function read(RequestDTOInterface $requestDTO): ResultDTOInterface;
    public function update(RequestDTOInterface $requestDTO): ResultDTOInterface;
    public function delete(RequestDTOInterface $requestDTO): ResultDTOInterface;
    public function all(RequestDTOInterface $requestDTO): ResultDTOInterface;
}