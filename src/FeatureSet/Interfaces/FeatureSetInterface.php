<?php

namespace Droedex\FF\FeatureSet\Interfaces;

use Droedex\FF\Enums\FeaturesEnum;
use Droedex\FF\Repository\DTO\Interfaces\ParametersDTOInterface;
use Droedex\FF\Repository\DTO\Interfaces\RequestDTOInterface;
use Droedex\FF\Repository\DTO\Interfaces\ResultDTOInterface;

interface FeatureSetInterface
{
    public function execute(FeaturesEnum $feature, ParametersDTOInterface $parametersDTO): ResultDTOInterface;
    public function create(ParametersDTOInterface $parametersDTO): ResultDTOInterface;
    public function read(ParametersDTOInterface $parametersDTO): ResultDTOInterface;
    public function update(ParametersDTOInterface $parametersDTO): ResultDTOInterface;
    public function delete(ParametersDTOInterface $parametersDTO): ResultDTOInterface;
    public function list(ParametersDTOInterface $parametersDTO): ResultDTOInterface;
}