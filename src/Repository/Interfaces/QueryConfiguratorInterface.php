<?php

namespace Droedex\FF\Repository\Interfaces;

use Exception;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;

interface QueryConfiguratorInterface
{
    /**
     * @throws Exception
     */
    public function query(Builder $query): Collection;
}