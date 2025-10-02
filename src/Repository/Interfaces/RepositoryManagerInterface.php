<?php

namespace Droedex\FF\Repository\Interfaces;

interface RepositoryManagerInterface
{
    public function getCommandRepository(string $unitName): CommandRepositoryInterface;
    public function getQueryRepository(string $unitName): QueryRepositoryInterface;
    public function getRepository(string $unitName): RepositoryInterface;
}