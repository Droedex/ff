<?php

declare(strict_types=1);

namespace Droedex\FF\Repository\Eloquent;

use Droedex\FF\Repository\DTO\Interfaces\RequestDTOInterface;
use Droedex\FF\Repository\DTO\Interfaces\ResultDTOInterface;
use Droedex\FF\Repository\Exceptions\FeatureNotFoundException;
use Droedex\FF\Repository\Interfaces\RepositoryInterface;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class EloquentRepository implements RepositoryInterface
{
    private string $table;

    private EloquentDTOBuilder $DTOBuilder;

    public function __construct(string $table, EloquentDTOBuilder $DTOBuilder)
    {
        $this->table = $table;
        $this->DTOBuilder = $DTOBuilder;
    }

    /**
     * @inheritdoc
     */
    public function create(RequestDTOInterface $requestDTO): ResultDTOInterface
    {
        try {
           $modelClassName = ModelResolverHelper::resolve($this->table);

           $result = $modelClassName::create($requestDTO->getData());

        } catch (QueryException $e) {
            throw new FeatureNotFoundException("Feature table [{$this->table}] not found", 0, $e);
        }

        return $this->DTOBuilder->create($result);
    }

    public function read(RequestDTOInterface $requestDTO): ResultDTOInterface
    {
        try {
            $stdClass = DB::table($this->table)
                ->select($requestDTO->getColumns())
                ->where('id', $requestDTO->getId())
                ->first();

        } catch (QueryException $e) {
            throw new FeatureNotFoundException("Feature table [{$this->table}] not found", 0, $e);
        }

        return $this->DTOBuilder->read($stdClass);
    }

    public function update(RequestDTOInterface $requestDTO): ResultDTOInterface
    {
        try {
            $collection = DB::table($this->table)
                ->select($requestDTO->getColumns())
                ->where('id', $requestDTO->getId())
                ->update($requestDTO->getData());

        } catch (QueryException $e) {
            throw new FeatureNotFoundException("Feature table [{$this->table}] not found", 0, $e);
        }

        return $this->DTOBuilder->update($collection);
    }

    public function delete(RequestDTOInterface $requestDTO): ResultDTOInterface
    {
        try {
            $id = $requestDTO->getId();

            $stroke = DB::table($this->table)
                ->where('id', $id)
                ->delete();

            var_dump($stroke);
        } catch (QueryException $e) {
            throw new FeatureNotFoundException("Feature table [{$this->table}] not found", 0, $e);
        }

        return $this->DTOBuilder->delete($stroke);
    }
    /**
     * @inheritdoc
     */
    public function all(RequestDTOInterface $requestDTO): ResultDTOInterface
    {
        try {
            $collection = DB::table($this->table)
                ->select($requestDTO->getColumns())
                ->limit($requestDTO->getLimit())
                ->get();

        } catch (QueryException $e) {
            throw new FeatureNotFoundException("Feature table [{$this->table}] not found", 0, $e);
        }

        return $this->DTOBuilder->all($collection);
    }

//
//    public function listWhere(array $conditions): Collection
//    {
//        // TODO: Implement listWhere() method.
//    }
//
//    public function pagination(int $pagination): LengthAwarePaginator
//    {
//        // TODO: Implement pagination() method.
//    }
//
//    public function show(int $id): Model
//    {
//        // TODO: Implement show() method.
//    }
//
//    public function update(int $id): Model
//    {
//        // TODO: Implement update() method.
//    }
//
//    public function delete(int $id): void
//    {
//        // TODO: Implement delete() method.
//    }
}