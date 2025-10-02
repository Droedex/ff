<?php

namespace Droedex\FF\Repository\Interfaces;

use Droedex\FF\Repository\FeatureCreateDTO;
use Droedex\FF\Repository\FeatureUpdateDTO;

interface CommandRepositoryInterface
{
    public function create(FeatureCreateDTO $data): int;

    public function update(int $id, FeatureUpdateDTO $data): bool;

    public function delete(int $id): bool;
}