<?php

declare(strict_types=1);

namespace Droedex\FF\Repository\DTO;

use Droedex\FF\Repository\DTO\Interfaces\RequestDTOInterface;

/**
 * @TODO change name to Repository Request DTO ?
 */
class RequestDTO implements RequestDTOInterface
{
    private array $columns = ['*'];
    private int $limit = 180000;
    private array $data;
    private int $id;

    /**
     * @inheritdoc
     */
    public function getColumns(): array
    {
        return $this->columns;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function setColumns(array $columns): void
    {
        $this->columns = $columns;
    }

    public function setLimit(int $limit): void
    {
        $this->limit = $limit;
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
}