<?php

use App\Modules\rolemanager\Models\SystemPermission;
use App\Modules\rolemanager\Repositories\SystemPermissionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SystemPermissionRepositoryTest extends TestCase
{
    use MakeSystemPermissionTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var SystemPermissionRepository
     */
    protected $systemPermissionRepo;

    public function setUp()
    {
        parent::setUp();
        $this->systemPermissionRepo = App::make(SystemPermissionRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateSystemPermission()
    {
        $systemPermission = $this->fakeSystemPermissionData();
        $createdSystemPermission = $this->systemPermissionRepo->create($systemPermission);
        $createdSystemPermission = $createdSystemPermission->toArray();
        $this->assertArrayHasKey('id', $createdSystemPermission);
        $this->assertNotNull($createdSystemPermission['id'], 'Created SystemPermission must have id specified');
        $this->assertNotNull(SystemPermission::find($createdSystemPermission['id']), 'SystemPermission with given id must be in DB');
        $this->assertModelData($systemPermission, $createdSystemPermission);
    }

    /**
     * @test read
     */
    public function testReadSystemPermission()
    {
        $systemPermission = $this->makeSystemPermission();
        $dbSystemPermission = $this->systemPermissionRepo->find($systemPermission->id);
        $dbSystemPermission = $dbSystemPermission->toArray();
        $this->assertModelData($systemPermission->toArray(), $dbSystemPermission);
    }

    /**
     * @test update
     */
    public function testUpdateSystemPermission()
    {
        $systemPermission = $this->makeSystemPermission();
        $fakeSystemPermission = $this->fakeSystemPermissionData();
        $updatedSystemPermission = $this->systemPermissionRepo->update($fakeSystemPermission, $systemPermission->id);
        $this->assertModelData($fakeSystemPermission, $updatedSystemPermission->toArray());
        $dbSystemPermission = $this->systemPermissionRepo->find($systemPermission->id);
        $this->assertModelData($fakeSystemPermission, $dbSystemPermission->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteSystemPermission()
    {
        $systemPermission = $this->makeSystemPermission();
        $resp = $this->systemPermissionRepo->delete($systemPermission->id);
        $this->assertTrue($resp);
        $this->assertNull(SystemPermission::find($systemPermission->id), 'SystemPermission should not exist in DB');
    }
}
