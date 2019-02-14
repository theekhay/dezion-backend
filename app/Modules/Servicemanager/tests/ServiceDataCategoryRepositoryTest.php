<?php

use App\Modules\Servicemanager\Models\ServiceDataCategory;
use App\Modules\Servicemanager\Repositories\ServiceDataCategoryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ServiceDataCategoryRepositoryTest extends TestCase
{
    use MakeServiceDataCategoryTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ServiceDataCategoryRepository
     */
    protected $serviceDataCategoryRepo;

    public function setUp()
    {
        parent::setUp();
        $this->serviceDataCategoryRepo = App::make(ServiceDataCategoryRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateServiceDataCategory()
    {
        $serviceDataCategory = $this->fakeServiceDataCategoryData();
        $createdServiceDataCategory = $this->serviceDataCategoryRepo->create($serviceDataCategory);
        $createdServiceDataCategory = $createdServiceDataCategory->toArray();
        $this->assertArrayHasKey('id', $createdServiceDataCategory);
        $this->assertNotNull($createdServiceDataCategory['id'], 'Created ServiceDataCategory must have id specified');
        $this->assertNotNull(ServiceDataCategory::find($createdServiceDataCategory['id']), 'ServiceDataCategory with given id must be in DB');
        $this->assertModelData($serviceDataCategory, $createdServiceDataCategory);
    }

    /**
     * @test read
     */
    public function testReadServiceDataCategory()
    {
        $serviceDataCategory = $this->makeServiceDataCategory();
        $dbServiceDataCategory = $this->serviceDataCategoryRepo->find($serviceDataCategory->id);
        $dbServiceDataCategory = $dbServiceDataCategory->toArray();
        $this->assertModelData($serviceDataCategory->toArray(), $dbServiceDataCategory);
    }

    /**
     * @test update
     */
    public function testUpdateServiceDataCategory()
    {
        $serviceDataCategory = $this->makeServiceDataCategory();
        $fakeServiceDataCategory = $this->fakeServiceDataCategoryData();
        $updatedServiceDataCategory = $this->serviceDataCategoryRepo->update($fakeServiceDataCategory, $serviceDataCategory->id);
        $this->assertModelData($fakeServiceDataCategory, $updatedServiceDataCategory->toArray());
        $dbServiceDataCategory = $this->serviceDataCategoryRepo->find($serviceDataCategory->id);
        $this->assertModelData($fakeServiceDataCategory, $dbServiceDataCategory->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteServiceDataCategory()
    {
        $serviceDataCategory = $this->makeServiceDataCategory();
        $resp = $this->serviceDataCategoryRepo->delete($serviceDataCategory->id);
        $this->assertTrue($resp);
        $this->assertNull(ServiceDataCategory::find($serviceDataCategory->id), 'ServiceDataCategory should not exist in DB');
    }
}
