<?php

declare(strict_types=1);

namespace Droedex\FF\Tests\Unit;

use Droedex\FF\Enums\FeaturesEnum;
use Droedex\FF\FeatureSet\Builders\FeatureFactory;
use Droedex\FF\FeatureSet\FeatureSet;
use Droedex\FF\FeatureSet\Interfaces\FeatureInterface;
use Droedex\FF\Repository\DTO\Interfaces\RequestDTOInterface;
use Droedex\FF\Repository\DTO\Interfaces\ResultDTOInterface;
use Droedex\FF\Repository\Interfaces\RepositoryInterface;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;

class FeatureSetTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testGetAllInFeatureSet(): void
    {
        $repositoryMock = $this->createMock(RepositoryInterface::class);
        $requestDTOMock = $this->createMock(RequestDTOInterface::class);
        $resultDTOMock = $this->createMock(ResultDTOInterface::class);
        $featureMock = $this->createMock(FeatureInterface::class);
        $factoryMock = $this->createMock(FeatureFactory::class);

        $factoryMock->expects($this->once())
            ->method('make')
            ->with(FeaturesEnum::ALL, $repositoryMock)
            ->willReturn($featureMock);

        $featureMock->expects($this->once())
            ->method('execute')
            ->with($requestDTOMock)
            ->willReturn($resultDTOMock);

        $featureSet = new FeatureSet($factoryMock, $repositoryMock);

        $result = $featureSet->all($requestDTOMock);

        $this->assertSame($resultDTOMock, $result);
    }
}
