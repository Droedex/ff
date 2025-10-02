<?php

namespace Droedex\FF\Repository\Interfaces;

use Droedex\FF\Repository\FeatureDTO;

interface QueryRepositoryInterface
{
    public function findById(int $id): ?FeatureDTO;
    public function findAll(): array;
}