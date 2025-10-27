<?php

declare(strict_types=1);

namespace Droedex\FF\Repository\Configurators;

use Droedex\FF\Repository\Interfaces\QueryConfiguratorInterface;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;

class ListConfigurator extends BaseConfigurator implements QueryConfiguratorInterface
{
    public function prepare(Builder $query): Builder
    {
        $QueryConfigDTO = $this->parametersDTO;
        $query->select($QueryConfigDTO->getColumns());

        if ($joins = $QueryConfigDTO->getJoins()) {
            foreach ($joins as $join) {
                [$table, $left, $op, $right] = $join;
                $query->leftJoin($table, $left, $op, $right);
            }
        }

        if ($wheres = $QueryConfigDTO->getWhere()) {
            foreach ($wheres as $where) {
                [$column, $operator, $value] = $where;
                $query->where($column, $operator, $value);
            }
        }

        if ($orders = $QueryConfigDTO->getOrderBy()) {
            foreach ($orders as $order) {
                $query->orderBy($order['field'], $order['direction'] ?? 'asc');
            }
        }

        if ($limit = $QueryConfigDTO->getLimit()) {
            $query->limit($limit);
        }

        if ($offset = $QueryConfigDTO->getOffset()) {
            $query->offset($offset);
        }

        return $query;
    }

    public function query(Builder $query): Collection
    {
        $query = $this->prepare($query);

        return $query->get();
    }
}