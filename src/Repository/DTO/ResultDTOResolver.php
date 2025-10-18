<?php

namespace Droedex\FF\Repository\DTO;

use Droedex\FF\Repository\DTO\Interfaces\ResultDTOInterface;
use Droedex\FF\Repository\Eloquent\QueryDTO;
use Illuminate\Support\Collection;

class ResultDTOResolver
{
    public function list(Collection $collection): ResultDTOInterface
    {
        return new QueryDTO($collection);
    }
}