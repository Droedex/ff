<?php

declare(strict_types=1);

namespace Droedex\FF\Repository\Configurators;

use Droedex\FF\Repository\Eloquent\ModelResolverHelper;
use Droedex\FF\Repository\Interfaces\CommandConfiguratorInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

class UpdateConfigurator extends BaseConfigurator implements CommandConfiguratorInterface
{
    /**
     * @inheritdoc
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

    /**
     * @inheritdoc
     */
    public function execute(string $table): bool
    {
        /** @var Model $modelClassName */
        $modelClassName = ModelResolverHelper::resolve($table);
        $query = $modelClassName::query();

        $query = $this->prepare($query);

        $query->update($this->parametersDTO->getData());

        return true;
    }
}