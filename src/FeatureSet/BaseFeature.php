<?php

declare(strict_types=1);

namespace Droedex\FF\FeatureSet;

use Droedex\FF\Repository\Interfaces\RepositoryInterface;

class BaseFeature
{
    protected RepositoryInterface $repository;

    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}