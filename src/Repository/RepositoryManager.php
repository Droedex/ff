<?php

declare(strict_types=1);

namespace Droedex\FF\Repository;

use Droedex\FF\Repository\DTO\ParametersDTO;
use Droedex\FF\Repository\Eloquent\EloquentDTOBuilder;
use Droedex\FF\Repository\Eloquent\EloquentRepository;
use Droedex\FF\Repository\Interfaces\CommandRepositoryInterface;
use Droedex\FF\Repository\Interfaces\QueryRepositoryInterface;
use Droedex\FF\Repository\Interfaces\RepositoryInterface;
use Droedex\FF\Repository\Interfaces\RepositoryManagerInterface;

class RepositoryManager implements RepositoryManagerInterface
{
    public function getCommandRepository(string $unitName): CommandRepositoryInterface
    {
        // TODO: Implement getCommandRepository() method.
    }

    public function getQueryRepository(string $unitName): QueryRepositoryInterface
    {
        // TODO: Implement getQueryRepository() method.
    }

    public function getRepository(ParametersDTO $parameters): RepositoryInterface
    {
        $eloquentResultDTOBuilder = new EloquentDTOBuilder();

        return new EloquentRepository($parameters, $eloquentResultDTOBuilder);
    }
}