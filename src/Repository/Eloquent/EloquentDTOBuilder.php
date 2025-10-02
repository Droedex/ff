<?php

declare(strict_types=1);

namespace Droedex\FF\Repository\Eloquent;

use Droedex\FF\Repository\DTO\Interfaces\ResultDTOInterface;
use Illuminate\Support\Collection;

class EloquentDTOBuilder
{
    public function all(Collection $collection): ResultDTOInterface
    {
        return new ResultDTO($collection);
    }
}