<?php

namespace Droedex\FF\Repository\Interfaces;

use Droedex\FF\Repository\DTO\Interfaces\ResultDTOInterface;
use Exception;

interface RepositoryInterface
{
    /**
     * Create item
     *
     * @param CommandConfiguratorInterface $commandConfigurator
     *
     * @return ResultDTOInterface
     *
     * @throws Exception
     */
    public function create(CommandConfiguratorInterface $commandConfigurator, array $data): ResultDTOInterface;

    /**
     * @throws Exception
     */
    public function read(QueryConfiguratorInterface $queryConfigurator): ResultDTOInterface;

    /**
     * @throws Exception
     */
    public function update(CommandConfiguratorInterface $commandConfigurator, array $data): ResultDTOInterface;

    /**
     * @throws Exception
     */
    public function delete(CommandConfiguratorInterface $commandConfigurator): ResultDTOInterface;

    /**
     * Get all items
     *
     * @param QueryConfiguratorInterface $queryConfigurator
     *
     * @return ResultDTOInterface
     *
     * @throws Exception
     */
    public function List(QueryConfiguratorInterface $queryConfigurator): ResultDTOInterface;
}