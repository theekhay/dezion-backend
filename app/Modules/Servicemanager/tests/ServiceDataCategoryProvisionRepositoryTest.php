<?php

use App\Modules\Servicemanager\Models\ServiceDataCategoryProvision;
use App\Modules\Servicemanager\Repositories\ServiceDataCategoryProvisionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ServiceDataCategoryProvisionRepositoryTest extends TestCase
{
    use MakeServiceDataCategoryProvisionTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ServiceDataCategoryProvisionRepository
     */
    protected $serviceDataCategoryProvisionRepo;

    public function setUp()
    {
        parent::setUp();
        $this->serviceDataCategoryProvisionRepo = App::make(ServiceDataCategoryProvisionRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateServiceDataCategoryProvision()
    {
        $serviceDataCategoryProvision = $this->fakeServiceDataCategoryProvisionData();
        $createdServiceDataCategoryProvision = $this->serviceDataCategoryProvisionRepo->create($serviceDataCategoryProvision);
        $createdServiceDataCategoryProvision = $createdServiceDataCategoryProvision->toArray();
        $this->assertArrayHasKey('id', $createdServiceDataCategoryProvision);
        $this->assertNotNull($createdServiceDataCategoryProvision['id'], 'Created ServiceDataCategoryProvision must have id specified');
        $this->assertNotNull(ServiceDataCategoryProvision::find($createdServiceDataCategoryProvision['id']), 'ServiceDataCategoryProvision with given id must be in DB');
        $this->assertModelData($serviceDataCategoryProvision, $createdServiceDataCategoryProvision);
    }

    /**
     * @test read
     */
    public function testReadServiceDataCategoryProvision()
    {
        $serviceDataCategoryProvision = $this->makeServiceDataCategoryProvision();
        $dbServiceDataCategoryProvision = $this->serviceDataCategoryProvisionRepo->find($serviceDataCategoryProvision->id);
        $dbServiceDataCategoryProvision = $dbServiceDataCategoryProvision->toArray();
        $this->assertModelData($serviceDataCategoryProvision->toArray(), $dbServiceDataCategoryProvision);
    }

    /**
     * @test update
     */
    public function testUpdateServiceDataCategoryProvision()
    {
        $serviceDataCategoryProvision = $this->makeServiceDataCategoryProvision();
        $fakeServiceDataCategoryProvision = $this->fakeServiceDataCategoryProvisionData();
        $updatedServiceDataCategoryProvision = $this->serviceDataCategoryProvisionRepo->update($fakeServiceDataCategoryProvision, $serviceDataCategoryProvision->id);
        $this->assertModelData($fakeServiceDataCategoryProvision, $updatedServiceDataCategoryProvision->toArray());
        $dbServiceDataCategoryProvision = $this->serviceDataCategoryProvisionRepo->find($serviceDataCategoryProvision->id);
        $this->assertModelData($fakeServiceDataCategoryProvision, $dbServiceDataCategoryProvision->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteServiceDataCategoryProvision()
    {
        $serviceDataCategoryProvision = $this->makeServiceDataCategoryProvision();
        $resp = $this->serviceDataCategoryProvisionRepo->delete($serviceDataCategoryProvision->id);
        $this->assertTrue($resp);
        $this->assertNull(ServiceDataCategoryProvision::find($serviceDataCategoryProvision->id), 'ServiceDataCategoryProvision should not exist in DB');
    }
}
