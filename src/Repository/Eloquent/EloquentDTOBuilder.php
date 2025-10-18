<?php

declare(strict_types=1);

namespace Droedex\FF\Repository\Eloquent;

use Droedex\FF\Repository\DTO\Interfaces\ResultDTOInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class EloquentDTOBuilder
{
    public function all(Collection $collection): ResultDTOInterface
    {
        return new QueryDTO($collection);
    }

    public function create(Model $model): ResultDTOInterface
    {
        return new QueryDTO($model);
    }

    public function executed(): CommandDto
    {
        return new CommandDto();
    }
}