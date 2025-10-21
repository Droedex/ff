<?php

declare(strict_types=1);

namespace Droedex\FF\Repository\DTO;

use Droedex\FF\Repository\DTO\Interfaces\ResultDTOInterface;

class OutputDTO implements ResultDTOInterface
{
    private bool $status = true;
    private array $collect;

    public function __construct(array $collect = [])
    {
        $this->collect = $collect;
    }

    public function getCollect(): array
    {
        return $this->collect;
    }

    public function getStatus(): bool
    {
        return $this->status;
    }
}