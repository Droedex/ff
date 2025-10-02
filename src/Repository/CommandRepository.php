<?php

declare(strict_types=1);

namespace Droedex\FF\Repository;

use Droedex\FF\Repository\Interfaces\CommandRepositoryInterface;

class CommandRepository implements CommandRepositoryInterface
{
    public function create(FeatureCreateDTO $data): int
    {
        // TODO: Implement create() method.
    }

    public function update(int $id, FeatureUpdateDTO $data): bool
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id): bool
    {
        // TODO: Implement delete() method.
    }
}