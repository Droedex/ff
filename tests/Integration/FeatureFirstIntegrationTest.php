<?php

declare(strict_types=1);

namespace Droedex\FF\Tests\Integration;

use Droedex\FF\Application\FeatureManager;
use Droedex\FF\FFServiceProvider;
use Droedex\FF\Repository\DTO\Interfaces\ResultDTOInterface;
use Droedex\FF\Repository\DTO\RequestDTO;
use Droedex\FF\Repository\Eloquent\EloquentRepository;
use Droedex\FF\Repository\Exceptions\FeatureNotFoundException;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class FeatureFirstIntegrationTest extends TestCase
{
    use RefreshDatabase;

    private EloquentRepository $repository;

    private FeatureManager $featureManager;

    protected function setUp(): void
    {
        parent::setUp();

        $this->featureManager = $this->app->make(FeatureManager::class);
    }

    protected function getPackageProviders($app): array
    {
        return [
            FFServiceProvider::class,
        ];
    }

    public function testExceptionGetFeatureAllInUnknownUnit(): void
    {
        $this->assertInstanceOf(FeatureManager::class,$this->featureManager);

        $requestDto = new RequestDTO();

        $featureSet = $this->featureManager->getFeatureSet('unknown');

        $this->expectException(FeatureNotFoundException::class);

        $featureSet->all($requestDto);
    }

    public function testGetFeatureAllInUserUnit(): void
    {
        $this->initData();

        $this->assertInstanceOf(FeatureManager::class,$this->featureManager);

        $requestDto = new RequestDTO();

        $featureSet = $this->featureManager->getFeatureSet('users');
        $all = $featureSet->all($requestDto);

        $this->assertInstanceOf(ResultDTOInterface::class, $all);
    }

    private function initData()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamps();
        });

        Schema::create('code', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('label');
        });

        DB::table('users')->insert([
            ['name' => 'Alice', 'email' => 'alice@example.com'],
            ['name' => 'Bob', 'email' => 'bob@example.com'],
        ]);

        DB::table('code')->insert([
            ['user_id' => 1, 'label' => 'Alice_l'],
            ['user_id' => 2, 'label' => 'Bob_l'],
        ]);

    }
}
