<?php

use App\Modules\Servicemanager\Models\ServiceDataComponentProvision;
use App\Modules\Servicemanager\Repositories\ServiceDataComponentProvisionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ServiceDataComponentProvisionRepositoryTest extends TestCase
{
    use MakeServiceDataComponentProvisionTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ServiceDataComponentProvisionRepository
     */
    protected $serviceDataComponentProvisionRepo;

    public function setUp()
    {
        parent::setUp();
        $this->serviceDataComponentProvisionRepo = App::make(ServiceDataComponentProvisionRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateServiceDataComponentProvision()
    {
        $serviceDataComponentProvision = $this->fakeServiceDataComponentProvisionData();
        $createdServiceDataComponentProvision = $this->serviceDataComponentProvisionRepo->create($serviceDataComponentProvision);
        $createdServiceDataComponentProvision = $createdServiceDataComponentProvision->toArray();
        $this->assertArrayHasKey('id', $createdServiceDataComponentProvision);
        $this->assertNotNull($createdServiceDataComponentProvision['id'], 'Created ServiceDataComponentProvision must have id specified');
        $this->assertNotNull(ServiceDataComponentProvision::find($createdServiceDataComponentProvision['id']), 'ServiceDataComponentProvision with given id must be in DB');
        $this->assertModelData($serviceDataComponentProvision, $createdServiceDataComponentProvision);
    }

    /**
     * @test read
     */
    public function testReadServiceDataComponentProvision()
    {
        $serviceDataComponentProvision = $this->makeServiceDataComponentProvision();
        $dbServiceDataComponentProvision = $this->serviceDataComponentProvisionRepo->find($serviceDataComponentProvision->id);
        $dbServiceDataComponentProvision = $dbServiceDataComponentProvision->toArray();
        $this->assertModelData($serviceDataComponentProvision->toArray(), $dbServiceDataComponentProvision);
    }

    /**
     * @test update
     */
    public function testUpdateServiceDataComponentProvision()
    {
        $serviceDataComponentProvision = $this->makeServiceDataComponentProvision();
        $fakeServiceDataComponentProvision = $this->fakeServiceDataComponentProvisionData();
        $updatedServiceDataComponentProvision = $this->serviceDataComponentProvisionRepo->update($fakeServiceDataComponentProvision, $serviceDataComponentProvision->id);
        $this->assertModelData($fakeServiceDataComponentProvision, $updatedServiceDataComponentProvision->toArray());
        $dbServiceDataComponentProvision = $this->serviceDataComponentProvisionRepo->find($serviceDataComponentProvision->id);
        $this->assertModelData($fakeServiceDataComponentProvision, $dbServiceDataComponentProvision->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteServiceDataComponentProvision()
    {
        $serviceDataComponentProvision = $this->makeServiceDataComponentProvision();
        $resp = $this->serviceDataComponentProvisionRepo->delete($serviceDataComponentProvision->id);
        $this->assertTrue($resp);
        $this->assertNull(ServiceDataComponentProvision::find($serviceDataComponentProvision->id), 'ServiceDataComponentProvision should not exist in DB');
    }
}
