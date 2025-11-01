<?php

declare(strict_types=1);

namespace Droedex\FF\Repository\Eloquent\Configurators;

use Droedex\FF\Repository\DTO\ParametersDTO;
use Droedex\FF\Repository\Interfaces\QueryConfiguratorInterface;
use Illuminate\Database\Query\Builder;

class ListConfigurator extends BaseConfigurator implements QueryConfiguratorInterface
{
    public function prepare(Builder $query, ParametersDTO $parameters): Builder
    {
        $QueryConfigDTO = $parameters;
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
}