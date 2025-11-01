<?php

declare(strict_types=1);

namespace Droedex\FF\Repository\Eloquent;

use Droedex\FF\Repository\DTO\Interfaces\ResultDTOInterface;
use Droedex\FF\Repository\DTO\ListResultDTO;
use Droedex\FF\Repository\DTO\ParametersDTO;
use Droedex\FF\Repository\Exceptions\FeatureNotFoundException;
use Droedex\FF\Repository\Interfaces\CommandConfiguratorInterface;
use Droedex\FF\Repository\Interfaces\QueryConfiguratorInterface;
use Droedex\FF\Repository\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class EloquentRepository implements RepositoryInterface
{
    private string $table;
    private ParametersDTO $parameters;

    private EloquentDTOBuilder $DTOBuilder;

    public function __construct(ParametersDTO $parameters, EloquentDTOBuilder $DTOBuilder)
    {
        $this->parameters = $parameters;
        $this->table = $parameters->getUnitName();
        $this->DTOBuilder = $DTOBuilder;
    }

    /**
     * @inheritdoc
     */
    public function create(CommandConfiguratorInterface $commandConfigurator, array $data): ResultDTOInterface
    {
        try {
            $builder = $this->getEloquentBuilder();
            $builder = $commandConfigurator->prepare($builder,$this->parameters);
            $builder->create($data);

        } catch (QueryException $e) {
            throw new FeatureNotFoundException("Feature table [{$this->table}] not found", 0, $e);
        }

        return $this->DTOBuilder->create(true);
    }

    /**
     * @inheritdoc
     */
    public function read(QueryConfiguratorInterface $queryConfigurator): ResultDTOInterface
    {
        try {
            $builder = $this->getBuilder();
            $builder = $queryConfigurator->prepare($builder, $this->parameters);

            $item = $builder->get();

        } catch (QueryException $e) {
            throw new FeatureNotFoundException("Feature table [{$this->table}] not found", 0, $e);
        }

        return $this->DTOBuilder->read($item);
    }

    /**
     * @inheritdoc
     */
    public function update(CommandConfiguratorInterface $commandConfigurator, array $data): ResultDTOInterface
    {
        try {
            $builder = $this->getEloquentBuilder();
            $builder = $commandConfigurator->prepare($builder, $this->parameters);
            $builder->update($data);

        } catch (QueryException $e) {
            throw new FeatureNotFoundException("Feature table [{$this->table}] not found", 0, $e);
        }

        return $this->DTOBuilder->update(true);
    }

    public function delete(CommandConfiguratorInterface $commandConfigurator): ResultDTOInterface
    {
        try {
            $builder = $this->getEloquentBuilder();
            $builder = $commandConfigurator->prepare($builder, $this->parameters);
            $builder->delete();

        } catch (QueryException $e) {
            throw new FeatureNotFoundException("Feature table [{$this->table}] not found", 0, $e);
        }

        return $this->DTOBuilder->delete(true);
    }

    /**
     * @inheritdoc
     */
    public function List(QueryConfiguratorInterface $queryConfigurator): ResultDTOInterface
    {
        try {
            $builder = $this->getBuilder();
            $builder = $queryConfigurator->prepare($builder, $this->parameters);
            $collection = $builder->get();
        } catch (QueryException $e) {
            throw new FeatureNotFoundException("Feature table [{$this->table}] not found", 0, $e);
        }

        return $this->DTOBuilder->list($collection);
    }

    private function getBuilder(): Builder
    {
        return DB::table( $this->table);
    }

    private function getEloquentBuilder(): EloquentBuilder
    {
        /** @var Model $modelClassName */
        $modelClassName = ModelResolverHelper::resolve( $this->table);

        return $modelClassName::query();
    }
}