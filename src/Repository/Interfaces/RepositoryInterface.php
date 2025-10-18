<?php

namespace Droedex\FF\Repository\Interfaces;

use Droedex\FF\Repository\DTO\Interfaces\RequestDTOInterface;
use Droedex\FF\Repository\DTO\Interfaces\ResultDTOInterface;

interface RepositoryInterface
{
    /**
     * Create item
     *
     * @param RequestDTOInterface $requestDTO
     *
     * @return ResultDTOInterface
     */
    public function create(RequestDTOInterface $requestDTO): ResultDTOInterface;

    public function read(RequestDTOInterface $requestDTO): ResultDTOInterface;

    public function update(RequestDTOInterface $requestDTO): ResultDTOInterface;

    public function delete(RequestDTOInterface $requestDTO): ResultDTOInterface;

    /**
     * Get all items
     *
     * @param RequestDTOInterface $requestDTO
     *
     * @return ResultDTOInterface
     */
    public function all(RequestDTOInterface $requestDTO): ResultDTOInterface;
}