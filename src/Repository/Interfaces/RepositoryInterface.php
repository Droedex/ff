<?php

namespace Droedex\FF\Repository\Interfaces;

use Droedex\FF\Repository\DTO\Interfaces\ResultDTOInterface;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface RepositoryInterface
{
//    public function store(): Model;
    public function all(array $columns): ResultDTOInterface;
//    public function listWhere(array $conditions): Collection;
//    public function pagination(int $pagination): LengthAwarePaginator;
//    public function show(int $id): Model;
//    public function update(int $id): Model;
//    public function delete(int $id): void;

}