<?php

declare(strict_types=1);

namespace Droedex\FF\Application;

use Droedex\FF\FeatureSet;
use Droedex\FF\FeatureSet\Builders\FeatureFactory;
use Droedex\FF\FeatureSet\Interfaces\FeatureSetInterface;
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

    public function build(string $unitName): FeatureSetInterface
    {
        $repository = $this->repositoryManager->getRepository($unitName);

        //TODO Repository resolver
        return new FeatureSet($this->featureFactory, $repository);
    }
}