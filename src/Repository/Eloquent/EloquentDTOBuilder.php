<?php

declare(strict_types=1);

namespace Droedex\FF\Repository\Eloquent;

use Droedex\FF\Repository\DTO\Interfaces\ResultDTOInterface;
use Droedex\FF\Repository\DTO\ListResultDTO;
use Droedex\FF\Repository\DTO\OutputDTO;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

// TODO Temporary
class EloquentDTOBuilder
{
    //TODO nake  one method after command
    public function create(bool $bool): ResultDTOInterface
    {
        return new OutputDTO(collect([]));
    }

    public function read(Collection $data)
    {
        return new OutputDTO($data);
    }

    //TODO nake  one method after command
    public function update(bool $bool)
    {
        return new OutputDTO(collect([]));
    }

    //TODO nake  one method after command
    public function delete(bool $bool): ResultDTOInterface
    {
        return new OutputDTO(collect([]));
    }

    public function list(Collection $collection): ResultDTOInterface
    {
        return new ListResultDTO(true, $collection);
    }

//    public function executed(): CommandDto
//    {
//        return new CommandDto();
//    }
}