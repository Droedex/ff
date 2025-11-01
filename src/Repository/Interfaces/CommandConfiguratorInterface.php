<?php

namespace Droedex\FF\Repository\Interfaces;

use Droedex\FF\Repository\DTO\ParametersDTO;
use Exception;
use Illuminate\Database\Eloquent\Builder;

interface CommandConfiguratorInterface
{
    /**
     * @throws Exception
     */
    public function prepare(Builder $builder, ParametersDTO $parameters): Builder;
}