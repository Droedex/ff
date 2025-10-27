<?php

declare(strict_types=1);

namespace Droedex\FF\Tests\Integration;

use Droedex\FF\Repository\Configurators\ListConfigurator;
use Droedex\FF\Repository\DTO\ParametersDTO;
use Droedex\FF\Repository\DTO\RequestDTO;
use Droedex\FF\Repository\Eloquent\EloquentDTOBuilder;
use Droedex\FF\Repository\Eloquent\EloquentRepository;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;

class EloquentRepositoryIntegrationTest extends TestCase
{
    use RefreshDatabase;

    private EloquentRepository $repository;
    private string $tableName = 'users';

    protected function setUp(): void
    {
        parent::setUp();

        Schema::create($this->tableName, function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamps();
        });

        $dtoBuilder = new EloquentDTOBuilder();
        $this->repository = new EloquentRepository($this->tableName, $dtoBuilder);
    }

    /** @test */
    public function it_can_retrieve_all_records_from_the_database(): void
    {
        \Illuminate\Support\Facades\DB::table($this->tableName)->insert([
            ['name' => 'Alice', 'email' => 'alice@example.com'],
            ['name' => 'Bob', 'email' => 'bob@example.com'],
        ]);

        $parameters = new ParametersDTO();
        $parameters->setLimit(2);

        $configurator = new ListConfigurator($parameters);

        $resultDTO = $this->repository->List($configurator);

        $data = $resultDTO->getCollection();

        $this->assertCount(2, $data);
        $this->assertEquals('Alice', $data[0]->name);
        $this->assertEquals('Bob', $data[1]->name);
    }

    /** @test */
    public function it_respects_the_limit_parameter(): void
    {
        \Illuminate\Support\Facades\DB::table($this->tableName)->insert([
            ['name' => 'Alice', 'email' => 'alice@example.com'],
            ['name' => 'Bob', 'email' => 'bob@example.com'],
            ['name' => 'Charlie', 'email' => 'charlie@example.com'],
        ]);

        $parameters = new ParametersDTO();
        $parameters->setLimit(2);

        $configurator = new ListConfigurator($parameters);

        $resultDTO = $this->repository->List($configurator);

        $this->assertCount(2, $resultDTO->getCollection());
    }
}