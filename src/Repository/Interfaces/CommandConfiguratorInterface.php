<?php

namespace Droedex\FF\Repository\Interfaces;

use Exception;

interface CommandConfiguratorInterface
{
    /**
     * @throws Exception
     */
    public function execute(string $table): bool;
}