<?php

declare(strict_types=1);

namespace Droedex\FF\Repository\Configurators;

use Droedex\FF\Repository\Eloquent\ModelResolverHelper;
use Droedex\FF\Repository\Interfaces\CommandConfiguratorInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

class DeleteConfigurator extends BaseConfigurator implements CommandConfiguratorInterface
{
    /**
     * @throws \Exception
     */
    public function prepare(Builder $query): Builder
    {
        try {
            $query->where('id', $this->parametersDTO->getId());

            return $query;

        } catch (QueryException $e) {
            throw new \Exception("Bat query parameter [{$this->parametersDTO->getId()}]", 0, $e);
        }
    }

    public function execute(string $table): bool
    {
        /** @var Model $modelClassName */
        $modelClassName = ModelResolverHelper::resolve($table);
        $query = $modelClassName::query();

        $query = $this->prepare($query);

        $query->delete();

        return true;
    }
}