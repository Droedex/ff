<?php

declare(strict_types=1);

namespace Droedex\FF\Repository\Eloquent;

use Droedex\FF\Repository\DTO\Interfaces\ResultDTOInterface;
use Illuminate\Support\Collection;

class QueryDTO implements ResultDTOInterface
{
    private Collection $collection;

    public function __construct(Collection $collection)
    {
        $this->collection = $collection;
    }

    public function get(): Collection
    {
        return $this->collection;
    }

    public function toArray(): array
    {
        return $this->collection->toArray();
    }
}