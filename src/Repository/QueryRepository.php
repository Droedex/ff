<?php

declare(strict_types=1);

namespace Droedex\FF\Repository;

use Droedex\FF\Repository\Interfaces\QueryRepositoryInterface;

class QueryRepository implements QueryRepositoryInterface
{

    public function findById(int $id): ?FeatureDTO
    {
        // TODO: Implement findById() method.
    }

    public function findAll(): array
    {
        // TODO: Implement findAll() method.
    }
}