<?php

declare(strict_types=1);

use Droedex\FF\FeatureSet\Builders\FeatureFactory;
use Droedex\FF\FeatureSet\FeatureSet;
use Droedex\FF\FeatureSet\Interfaces\FeatureInterface;
use PHPUnit\Framework\TestCase;

class FeatureSetTest extends TestCase
{
    public function test_feature_set_delegates_to_factory(): void
    {
        $factory = $this->createMock(FeatureFactory::class);
        $factory->expects($this->once())
            ->method('make')
            ->withAnyParameters()
            ->willReturn($this->createMock(FeatureInterface::class));

        $set = new FeatureSet($factory, 'users');

        $set->create();
    }
}