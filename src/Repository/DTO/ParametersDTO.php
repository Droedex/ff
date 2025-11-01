<?php

declare(strict_types=1);

namespace Droedex\FF\Repository\DTO;

use Droedex\FF\Repository\DTO\Interfaces\ParametersDTOInterface;

class ParametersDTO implements ParametersDTOInterface
{
    private array $columns = ['*'];

    private int $limit = 180000;

    private int $offset = 0;

    private array $where = [];

    private array $joins = [];

    private array $orders = [];

    private string $featureName;

    private int $id;

    private array $data;
    private string $unitName;

    public function __construct(string $unitName)
    {
        $this->unitName = $unitName;
    }

    public function getUnitName(): string
    {
        return $this->unitName;
    }

    public function setData(array $data): void
    {
        $this->data = $data;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getColumns(): array
    {
        return $this->columns;
    }

    public function getOrderBy(): array
    {
        return $this->orders;
    }

    public function setOrderBy(string $field, string $direction): void
    {
        $this->orders[] = ['field' => $field, 'direction' => $direction];
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function setLimit(int $limit): void
    {
        $this->limit = $limit;
    }

    public function getOffset(): int
    {
        return $this->offset;
    }

    public function setOffset(int $offset): void
    {
        $this->offset = $offset;
    }

    public function getJoins(): array
    {
        return $this->joins;
    }

    public function getWhere(): array
    {
        return $this->where;
    }

}