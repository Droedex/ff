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

    /**
     * @inheritDoc
     */
    public function execute(FeaturesEnum $feature, array $data = []): ResultDTOInterface
    {
        $feature = $this->featureFactory->make($feature, $this->repository);

        return $feature->execute($data);
    }

    /**
     * @inheritDoc
     */
    public function create(array $data): ResultDTOInterface
    {
        return $this->execute(FeaturesEnum::CREATE, $data);
    }

    public function read(): ResultDTOInterface
    {
        return $this->execute(FeaturesEnum::READ);
    }

    public function update(array $data): ResultDTOInterface
    {
        return $this->execute(FeaturesEnum::UPDATE, $data);
    }

    public function delete(): ResultDTOInterface
    {
        return $this->execute(FeaturesEnum::DELETE);
    }

    public function list(): ResultDTOInterface
    {
        return $this->execute(FeaturesEnum::List);
    }
}