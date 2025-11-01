<?php

namespace Droedex\FF\FeatureSet\Interfaces;

use Droedex\FF\Enums\FeaturesEnum;
use Droedex\FF\Repository\DTO\Interfaces\ResultDTOInterface;
use Exception;

interface FeatureSetInterface
{
    /**
     * @throws Exception
     */
    public function execute(FeaturesEnum $feature, array $data = []): ResultDTOInterface;

    /**
     * @throws Exception
     */
    public function create(array $data): ResultDTOInterface;

    /**
     * @throws Exception
     */
    public function read(): ResultDTOInterface;

    /**
     * @throws Exception
     */
    public function update(array $data): ResultDTOInterface;

    /**
     * @throws Exception
     */
    public function delete(): ResultDTOInterface;

    /**
     * @throws Exception
     */
    public function list(): ResultDTOInterface;
}