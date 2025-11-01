<?php

declare(strict_types=1);

namespace Droedex\FF\Repository\Eloquent\Configurators;

use Droedex\FF\Repository\DTO\ParametersDTO;
use Droedex\FF\Repository\Interfaces\CommandConfiguratorInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\QueryException;

class DeleteConfigurator extends BaseConfigurator implements CommandConfiguratorInterface
{
    public function prepare(Builder $builder, ParametersDTO $parameters): Builder
    {
        try {
            $builder->where('id', $parameters->getId());

            return $builder;

        } catch (QueryException $e) {
            throw new \Exception("Bat query parameter [{$parameters->getId()}]", 0, $e);
        }
    }
}