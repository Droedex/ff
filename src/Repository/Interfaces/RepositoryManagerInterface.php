<?php

namespace Droedex\FF\Repository\Interfaces;

use Droedex\FF\Repository\DTO\ParametersDTO;

interface RepositoryManagerInterface
{
    public function getCommandRepository(string $unitName): CommandRepositoryInterface;
    public function getQueryRepository(string $unitName): QueryRepositoryInterface;
    public function getRepository(ParametersDTO $parameters): RepositoryInterface;
}