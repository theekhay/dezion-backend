<?php

use App\Modules\rolemanager\Models\PermissionCategory;
use App\Modules\rolemanager\Repositories\PermissionCategoryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PermissionCategoryRepositoryTest extends TestCase
{
    use MakePermissionCategoryTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PermissionCategoryRepository
     */
    protected $permissionCategoryRepo;

    public function setUp()
    {
        parent::setUp();
        $this->permissionCategoryRepo = App::make(PermissionCategoryRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePermissionCategory()
    {
        $permissionCategory = $this->fakePermissionCategoryData();
        $createdPermissionCategory = $this->permissionCategoryRepo->create($permissionCategory);
        $createdPermissionCategory = $createdPermissionCategory->toArray();
        $this->assertArrayHasKey('id', $createdPermissionCategory);
        $this->assertNotNull($createdPermissionCategory['id'], 'Created PermissionCategory must have id specified');
        $this->assertNotNull(PermissionCategory::find($createdPermissionCategory['id']), 'PermissionCategory with given id must be in DB');
        $this->assertModelData($permissionCategory, $createdPermissionCategory);
    }

    /**
     * @test read
     */
    public function testReadPermissionCategory()
    {
        $permissionCategory = $this->makePermissionCategory();
        $dbPermissionCategory = $this->permissionCategoryRepo->find($permissionCategory->id);
        $dbPermissionCategory = $dbPermissionCategory->toArray();
        $this->assertModelData($permissionCategory->toArray(), $dbPermissionCategory);
    }

    /**
     * @test update
     */
    public function testUpdatePermissionCategory()
    {
        $permissionCategory = $this->makePermissionCategory();
        $fakePermissionCategory = $this->fakePermissionCategoryData();
        $updatedPermissionCategory = $this->permissionCategoryRepo->update($fakePermissionCategory, $permissionCategory->id);
        $this->assertModelData($fakePermissionCategory, $updatedPermissionCategory->toArray());
        $dbPermissionCategory = $this->permissionCategoryRepo->find($permissionCategory->id);
        $this->assertModelData($fakePermissionCategory, $dbPermissionCategory->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePermissionCategory()
    {
        $permissionCategory = $this->makePermissionCategory();
        $resp = $this->permissionCategoryRepo->delete($permissionCategory->id);
        $this->assertTrue($resp);
        $this->assertNull(PermissionCategory::find($permissionCategory->id), 'PermissionCategory should not exist in DB');
    }
}
