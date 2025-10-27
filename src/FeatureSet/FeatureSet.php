<?php

declare(strict_types=1);

namespace Droedex\FF\FeatureSet;

use Droedex\FF\Enums\FeaturesEnum;
use Droedex\FF\FeatureSet\Builders\FeatureFactory;
use Droedex\FF\FeatureSet\Interfaces\FeatureSetInterface;
use Droedex\FF\Repository\DTO\Interfaces\ParametersDTOInterface;
use Droedex\FF\Repository\DTO\Interfaces\RequestDTOInterface;
use Droedex\FF\Repository\DTO\Interfaces\ResultDTOInterface;
use Droedex\FF\Repository\Interfaces\RepositoryInterface;

class FeatureSet implements FeatureSetInterface
{
    private FeatureFactory $featureFactory;
    private RepositoryInterface $repository;

    public function __construct(FeatureFactory $featureFactory, RepositoryInterface $repository)
    {
        $this->featureFactory = $featureFactory;
        $this->repository = $repository;
    }

    public function execute(FeaturesEnum $feature, ParametersDTOInterface $parametersDTO): ResultDTOInterface
    {
        $feature = $this->featureFactory->make($feature, $this->repository);

        return $feature->execute($parametersDTO);
    }

    public function create(ParametersDTOInterface $parametersDTO): ResultDTOInterface
    {
        return $this->execute(FeaturesEnum::CREATE, $parametersDTO);
    }

    public function read(ParametersDTOInterface $parametersDTO): ResultDTOInterface
    {
        return $this->execute(FeaturesEnum::READ,$parametersDTO);
    }

    public function update(ParametersDTOInterface $parametersDTO): ResultDTOInterface
    {
        return $this->execute(FeaturesEnum::UPDATE, $parametersDTO);
    }

    public function delete(ParametersDTOInterface $parametersDTO): ResultDTOInterface
    {
        return $this->execute(FeaturesEnum::DELETE, $parametersDTO);
    }

    public function list(ParametersDTOInterface $parametersDTO): ResultDTOInterface
    {
        return $this->execute(FeaturesEnum::List,$parametersDTO);
    }
}