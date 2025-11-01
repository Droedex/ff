<?php

declare(strict_types=1);

namespace Droedex\FF\Repository\DTO;

use Droedex\FF\Repository\DTO\Interfaces\ResultDTOInterface;
use Illuminate\Support\Collection;

class OutputDTO implements ResultDTOInterface
{
    private bool $status = true;
    private Collection $collection;
    private int $affected = 0;
    private int $createdId = 0;
    private int $perPage = 0;

    public function __construct(Collection $collection)
    {
        $this->collection = $collection;
    }

    public function getCollection(): Collection
    {
        return $this->collection;
    }

    public function getStatus(): bool
    {
        return $this->status;
    }
}