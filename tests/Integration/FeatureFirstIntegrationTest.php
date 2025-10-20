<?php

declare(strict_types=1);

namespace Droedex\FF\Tests\Integration;

use Droedex\FF\Application\FeatureManager;
use Droedex\FF\FFServiceProvider;
use Droedex\FF\Repository\DTO\Interfaces\ResultDTOInterface;
use Droedex\FF\Repository\DTO\RequestDTO;
use Droedex\FF\Repository\Eloquent\CommandDto;
use Droedex\FF\Repository\Eloquent\EloquentRepository;
use Droedex\FF\Repository\Eloquent\QueryDTO;
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

    public function testCreateUnitFeature()
    {
        $this->initData();
        $requestDto = new RequestDTO();
        $data = ['name' => 'mike', 'email' => 'mike@example.com'];

        $requestDto->setData($data);

        $featureSet = $this->featureManager->getFeatureSet('user');
        $result = $featureSet->create($requestDto);

        $this->assertInstanceOf(CommandDto::class, $result);

        $this->assertEquals('mike', $result->model->name);
    }

    public function testReadUnitFeature()
    {
        $this->initData();
        $requestDto = new RequestDTO();
        $requestDto->setId(2);

        $featureSet = $this->featureManager->getFeatureSet('users');
        $result = $featureSet->read($requestDto);

        $this->assertInstanceOf(QueryDTO::class, $result);
        $this->assertEquals('Bob', $result->toArray()['name']);
    }

    public function testUpdateUnitFeature()
    {
        $this->initData();
        $requestDto = new RequestDTO();
        $requestDto->setId(3);
        $data = ['name' => 'mike2', 'email' => 'mike@example.com2'];

        $requestDto->setData($data);

        $featureSet = $this->featureManager->getFeatureSet('user');
        $result = $featureSet->update($requestDto);

        $this->assertInstanceOf(CommandDto::class, $result);

        $this->assertEquals('mike2', $result->model->name);
    }

    public function testDeleteUnitFeature()
    {
        $this->initData();
        $requestDto = new RequestDTO();
        $requestDto->setId(2);

        $featureSet = $this->featureManager->getFeatureSet('users');
        $result = $featureSet->delete($requestDto);

        $this->assertInstanceOf(CommandDto::class, $result);

        $this->assertEquals(null, $result->model->name);
    }

    public function testFeatureAllInUserUnit(): void
    {
        $this->initData();

        $requestDto = new RequestDTO();
        $requestDto->setLimit(10);

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
