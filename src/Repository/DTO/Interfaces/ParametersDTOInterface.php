<?php

namespace Droedex\FF\Repository\DTO\Interfaces;

interface ParametersDTOInterface
{
    /** @return string[] */
    public function getColumns(): array;

    /** @return array [['field' => 'created_at', 'direction' => 'desc']] */
    public function getOrderBy(): array;

    public function getLimit(): int;

    public function setLimit(int $limit): void;

    public function getOffset(): int;

    public function setData(array $data): void;

    public function getData(): array;

    public function getId(): int;

    public function setId(int $id): void;

    /** @return array [['table', 'left', '=', 'right']] */
    public function getJoins(): array;

    public function getWhere(): array;
}