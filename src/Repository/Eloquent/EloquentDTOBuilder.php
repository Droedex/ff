<?php

declare(strict_types=1);

namespace Droedex\FF\Repository\Eloquent;

use Droedex\FF\Repository\DTO\Interfaces\ResultDTOInterface;
use Droedex\FF\Repository\DTO\OutputDTO;
use Illuminate\Database\Eloquent\Model;

// TODO Temporary
class EloquentDTOBuilder
{
    public function create(array $data): ResultDTOInterface
    {
        return new OutputDTO($data);
    }

    public function read(array $data)
    {
        return new OutputDTO($data);
    }

    //TODO not use Model ?
    public function update(Model $model)
    {
        $collection = collect((array) $model);
        return new OutputDTO($collection);
    }

    public function delete(): ResultDTOInterface
    {
        return new OutputDTO();
    }

    public function all(array $collection): ResultDTOInterface
    {
        return new OutputDTO($collection);
    }

//    public function executed(): CommandDto
//    {
//        return new CommandDto();
//    }
}