<?php

namespace Droedex\FF\Repository\DTO\Interfaces;

use Illuminate\Support\Collection;

interface ResultDTOInterface
{
    public function getCollection(): Collection;
    public function getStatus(): bool;
}