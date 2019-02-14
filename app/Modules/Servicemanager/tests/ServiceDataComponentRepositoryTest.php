<?php

use App\Modules\Servicemanager\Models\ServiceDataComponent;
use App\Modules\Servicemanager\Repositories\ServiceDataComponentRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ServiceDataComponentRepositoryTest extends TestCase
{
    use MakeServiceDataComponentTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ServiceDataComponentRepository
     */
    protected $serviceDataComponentRepo;

    public function setUp()
    {
        parent::setUp();
        $this->serviceDataComponentRepo = App::make(ServiceDataComponentRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateServiceDataComponent()
    {
        $serviceDataComponent = $this->fakeServiceDataComponentData();
        $createdServiceDataComponent = $this->serviceDataComponentRepo->create($serviceDataComponent);
        $createdServiceDataComponent = $createdServiceDataComponent->toArray();
        $this->assertArrayHasKey('id', $createdServiceDataComponent);
        $this->assertNotNull($createdServiceDataComponent['id'], 'Created ServiceDataComponent must have id specified');
        $this->assertNotNull(ServiceDataComponent::find($createdServiceDataComponent['id']), 'ServiceDataComponent with given id must be in DB');
        $this->assertModelData($serviceDataComponent, $createdServiceDataComponent);
    }

    /**
     * @test read
     */
    public function testReadServiceDataComponent()
    {
        $serviceDataComponent = $this->makeServiceDataComponent();
        $dbServiceDataComponent = $this->serviceDataComponentRepo->find($serviceDataComponent->id);
        $dbServiceDataComponent = $dbServiceDataComponent->toArray();
        $this->assertModelData($serviceDataComponent->toArray(), $dbServiceDataComponent);
    }

    /**
     * @test update
     */
    public function testUpdateServiceDataComponent()
    {
        $serviceDataComponent = $this->makeServiceDataComponent();
        $fakeServiceDataComponent = $this->fakeServiceDataComponentData();
        $updatedServiceDataComponent = $this->serviceDataComponentRepo->update($fakeServiceDataComponent, $serviceDataComponent->id);
        $this->assertModelData($fakeServiceDataComponent, $updatedServiceDataComponent->toArray());
        $dbServiceDataComponent = $this->serviceDataComponentRepo->find($serviceDataComponent->id);
        $this->assertModelData($fakeServiceDataComponent, $dbServiceDataComponent->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteServiceDataComponent()
    {
        $serviceDataComponent = $this->makeServiceDataComponent();
        $resp = $this->serviceDataComponentRepo->delete($serviceDataComponent->id);
        $this->assertTrue($resp);
        $this->assertNull(ServiceDataComponent::find($serviceDataComponent->id), 'ServiceDataComponent should not exist in DB');
    }
}
