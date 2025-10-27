<?php

declare(strict_types=1);

namespace Droedex\FF\Repository\Configurators;

use Droedex\FF\Repository\Eloquent\ModelResolverHelper;
use Droedex\FF\Repository\Interfaces\CommandConfiguratorInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class CreateConfigurator extends BaseConfigurator implements CommandConfiguratorInterface
{
    public function prepare(Builder $query): Builder
    {
        return $query;
    }

    public function execute(string $table): bool
    {
        /** @var Model $modelClassName */
        $modelClassName = ModelResolverHelper::resolve($table);
        $query = $modelClassName::query();

        $query = $this->prepare($query);

        $query->create($this->parametersDTO->getData());

        return true;
    }
}