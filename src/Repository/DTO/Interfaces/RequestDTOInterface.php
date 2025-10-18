<?php

namespace Droedex\FF\Repository\DTO\Interfaces;

interface RequestDTOInterface
{
    /**
     * Get select columns
     *
     * @return array[string]
     */
    public function getColumns(): array;


    /**
     * Get select limit
     *
     * @return int
     */
    public function getLimit(): int;


    /**
     * Get post data
     *
     * @return array
     */
    public function getData(): array;

    /**
     * Set post data
     *
     * @param  array $data
     */
    public function setData(array $data): void;
}