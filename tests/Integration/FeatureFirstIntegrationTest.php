<?php

declare(strict_types=1);

namespace Droedex\FF\Tests\Integration;

use Droedex\FF\Application\FeatureManager;
use Droedex\FF\FFServiceProvider;
use Droedex\FF\Repository\DTO\Interfaces\ResultDTOInterface;
use Droedex\FF\Repository\DTO\OutputDTO;
use Droedex\FF\Repository\DTO\ParametersDTO;
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

        $parameters = new ParametersDTO();

        $featureSet = $this->featureManager->getFeatureSet('unknown');

        $this->expectException(FeatureNotFoundException::class);

        $featureSet->list($parameters);
    }

    public function testCreateUnitFeature()
    {
        $this->initData();
        $parameters = new ParametersDTO();
        $data = ['name' => 'mike', 'email' => 'mike@example.com'];

        $parameters->setData($data);

        $featureSet = $this->featureManager->getFeatureSet('user');
        $result = $featureSet->create($parameters);

        $this->assertInstanceOf(OutputDTO::class, $result);

       // $this->assertEquals('mike', $result->getCollect()[0]['name']);
    }

    public function testReadUnitFeature()
    {
        $this->initData();
        $parameters = new ParametersDTO();
        $parameters->setId(1);

        $featureSet = $this->featureManager->getFeatureSet('users');
        $result = $featureSet->read($parameters);

        $this->assertInstanceOf(OutputDTO::class, $result);
        //TODO  make user dto  such a caste is unacceptable $result->getCollect()[0]->name
        $this->assertEquals('Alice', $result->getCollection()[0]->name);
    }

    public function testUpdateUnitFeature()
    {
        $this->initData();

        $parameters = new ParametersDTO();
        $parameters->setId(2);


        $data = ['name' => 'mike2', 'email' => 'mike@example.com2'];

        $parameters->setData($data);

        $featureSet = $this->featureManager->getFeatureSet('user');
        $result = $featureSet->update($parameters);
        //$this->assertTrue($result);
        $this->assertInstanceOf(OutputDTO::class, $result);

        $featureSet = $this->featureManager->getFeatureSet('users');
        $read = $featureSet->read($parameters);
        var_dump($read->getCollection()->first());

        $this->assertEquals('mike2', $read->getCollection()->first()->name);
    }

    public function testDeleteUnitFeature()
    {
        $this->initData();
        $parameters = new ParametersDTO();
        $parameters->setId(2);

        $featureSet = $this->featureManager->getFeatureSet('user');
        $result = $featureSet->delete($parameters);

        $this->assertInstanceOf(OutputDTO::class, $result);

        $this->assertTrue($result->getStatus());

        //TODO check exists
    }

    public function testFeatureAllInUserUnit(): void
    {
        $this->initData();

        $parameters = new ParametersDTO();

        $featureSet = $this->featureManager->getFeatureSet('users');
        $all = $featureSet->list($parameters);

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
