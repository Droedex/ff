<?php

declare(strict_types=1);

namespace Droedex\FF\Repository\Eloquent\Configurators;

use Droedex\FF\Repository\DTO\ParametersDTO;
use Droedex\FF\Repository\Interfaces\CommandConfiguratorInterface;
use Illuminate\Database\Eloquent\Builder;

class CreateConfigurator extends BaseConfigurator implements CommandConfiguratorInterface
{
    public function prepare(Builder $builder, ParametersDTO $parameters): Builder
    {
        return $builder;
    }
}