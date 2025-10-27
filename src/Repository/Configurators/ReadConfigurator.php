<?php

declare(strict_types=1);

namespace Droedex\FF\Repository\Configurators;

use Droedex\FF\Repository\Interfaces\QueryConfiguratorInterface;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection;

class ReadConfigurator extends BaseConfigurator implements QueryConfiguratorInterface
{
    public function prepare(Builder $query): Builder
    {
        try {
            $query->select($this->parametersDTO->getColumns());
            $query->where('id', $this->parametersDTO->getId());

            return $query;
        } catch (QueryException $e) {
            throw new \Exception("Bat query parameter [{$this->parametersDTO->getId()}]", 0, $e);
        }
    }

    /**
     * @inheritdoc
     */
    public function query(Builder $query): Collection
    {
        $query = $this->prepare($query);

        return $query->get();
    }
}