<?php

declare(strict_types=1);

namespace Droedex\FF\Application;

use Droedex\FF\FeatureSet\Builders\FeatureFactory;
use Droedex\FF\FeatureSet\FeatureSet;
use Droedex\FF\FeatureSet\Interfaces\FeatureSetInterface;
use Droedex\FF\Repository\DTO\ParametersDTO;
use Droedex\FF\Repository\Interfaces\RepositoryManagerInterface;

class FeatureSetBuilder
{
    private FeatureFactory $featureFactory;
    private RepositoryManagerInterface $repositoryManager;

    public function __construct(FeatureFactory $featureFactory, RepositoryManagerInterface $repositoryManager)
    {
        $this->featureFactory = $featureFactory;
        $this->repositoryManager = $repositoryManager;
    }

    public function build(ParametersDTO $parameters): FeatureSetInterface
    {
        $repository = $this->repositoryManager->getRepository($parameters);

        //TODO Repository resolver
        return new FeatureSet($this->featureFactory, $repository);
    }
}