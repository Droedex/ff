<?php

namespace Droedex\FF\Repository\Interfaces;

use Droedex\FF\Repository\DTO\ParametersDTO;
use Exception;
use Illuminate\Database\Query\Builder;

interface QueryConfiguratorInterface
{
    /**
     * @throws Exception
     */
    public function prepare(Builder $query, ParametersDTO $parameters): Builder;
}