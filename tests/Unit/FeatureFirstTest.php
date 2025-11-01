<?php

declare(strict_types=1);

namespace Droedex\FF\Tests\Unit;

use Droedex\FF\Application\FeatureSetBuilder;
use Droedex\FF\FeatureSet\Builders\FeatureFactory;
use Droedex\FF\FeatureSet\FeatureSet;
use Droedex\FF\Repository\DTO\ParametersDTO;
use Droedex\FF\Repository\Interfaces\RepositoryInterface;
use Droedex\FF\Repository\Interfaces\RepositoryManagerInterface;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;

class FeatureFirstTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testBuildFeatureSet(): void
    {
        $featureFactoryMock = $this->createMock(FeatureFactory::class);
        $repositoryMock = $this->createMock(RepositoryInterface::class);
        $repositoryManagerMock = $this->createMock(RepositoryManagerInterface::class);

        $parameters = new ParametersDTO('test');

        $repositoryManagerMock->expects($this->once())
            ->method('getRepository')
            ->with($parameters)
            ->willReturn($repositoryMock);

        $featureSetBuilder = new FeatureSetBuilder($featureFactoryMock, $repositoryManagerMock);
        $featureSet = $featureSetBuilder->build($parameters);

        $this->assertInstanceOf(FeatureSet::class, $featureSet);
    }
}