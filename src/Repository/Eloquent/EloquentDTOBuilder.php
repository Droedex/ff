<?php

declare(strict_types=1);

namespace Droedex\FF\Repository\Eloquent;

use Droedex\FF\Repository\DTO\Interfaces\ResultDTOInterface;
use Droedex\FF\Repository\DTO\ResultDTO;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use stdClass;

class EloquentDTOBuilder
{
    public function create(Model $model): ResultDTOInterface
    {
        return new CommandDto($model);
    }

    public function read(stdClass $stdClass)
    {
        $collection = collect((array) $stdClass);
        return new QueryDTO($collection);
    }

    public function update(Model $model)
    {
        return new CommandDto($model);
    }

    public function delete(int $stroke): ResultDTO
    {
        $collection = collect(['id' => $stroke]);
        return new CommandDto($collection);
    }

    public function all(Collection $collection): ResultDTOInterface
    {
        return new QueryDTO($collection);
    }


//    public function executed(): CommandDto
//    {
//        return new CommandDto();
//    }


}