<?php

declare(strict_types=1);

namespace Droedex\FF\Repository\Eloquent\Configurators;

use Droedex\FF\Repository\DTO\ParametersDTO;
use Droedex\FF\Repository\Interfaces\QueryConfiguratorInterface;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\QueryException;

class ReadConfigurator extends BaseConfigurator implements QueryConfiguratorInterface
{
    public function prepare(Builder $query, ParametersDTO $parameters): Builder
    {
        try {
            $query->select($parameters->getColumns());
            $query->where('id', $parameters->getId());

            return $query;
        } catch (QueryException $e) {
            throw new \Exception("Bat query parameter [{$parameters->getId()}]", 0, $e);
        }
    }
}