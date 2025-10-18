<?php

declare(strict_types=1);

namespace Droedex\FF\FeatureSet;

use Droedex\FF\Enums\FeaturesEnum;
use Droedex\FF\FeatureSet\Builders\FeatureFactory;
use Droedex\FF\FeatureSet\Interfaces\FeatureSetInterface;
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

    public function execute(FeaturesEnum $feature, RequestDTOInterface $requestDTO): ResultDTOInterface
    {
        $feature = $this->featureFactory->make($feature, $this->repository);

        return $feature->execute($requestDTO);
    }

    public function create(RequestDTOInterface $requestDTO): ResultDTOInterface
    {
        return $this->execute(FeaturesEnum::CREATE, $requestDTO);
    }

    public function read(RequestDTOInterface $requestDTO): ResultDTOInterface
    {
        return $this->execute(FeaturesEnum::READ,$requestDTO);
    }

    public function update(RequestDTOInterface $requestDTO): ResultDTOInterface
    {
        return $this->execute(FeaturesEnum::UPDATE, $requestDTO);
    }

    public function delete(RequestDTOInterface $requestDTO): ResultDTOInterface
    {
        return $this->execute(FeaturesEnum::DELETE, $requestDTO);
    }

    public function all(RequestDTOInterface $requestDTO): ResultDTOInterface
    {
        return $this->execute(FeaturesEnum::ALL,$requestDTO);
    }
}