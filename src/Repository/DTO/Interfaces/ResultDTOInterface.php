<?php

namespace Droedex\FF\Repository\DTO\Interfaces;

interface ResultDTOInterface
{
    public function getCollect(): array;
    public function getStatus(): bool;
}