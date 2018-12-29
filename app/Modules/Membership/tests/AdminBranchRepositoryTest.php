<?php

use App\Modules\Membership\Models\AdminBranch;
use App\Modules\Membership\Repositories\AdminBranchRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminBranchRepositoryTest extends TestCase
{
    use MakeAdminBranchTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var AdminBranchRepository
     */
    protected $adminBranchRepo;

    public function setUp()
    {
        parent::setUp();
        $this->adminBranchRepo = App::make(AdminBranchRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateAdminBranch()
    {
        $adminBranch = $this->fakeAdminBranchData();
        $createdAdminBranch = $this->adminBranchRepo->create($adminBranch);
        $createdAdminBranch = $createdAdminBranch->toArray();
        $this->assertArrayHasKey('id', $createdAdminBranch);
        $this->assertNotNull($createdAdminBranch['id'], 'Created AdminBranch must have id specified');
        $this->assertNotNull(AdminBranch::find($createdAdminBranch['id']), 'AdminBranch with given id must be in DB');
        $this->assertModelData($adminBranch, $createdAdminBranch);
    }

    /**
     * @test read
     */
    public function testReadAdminBranch()
    {
        $adminBranch = $this->makeAdminBranch();
        $dbAdminBranch = $this->adminBranchRepo->find($adminBranch->id);
        $dbAdminBranch = $dbAdminBranch->toArray();
        $this->assertModelData($adminBranch->toArray(), $dbAdminBranch);
    }

    /**
     * @test update
     */
    public function testUpdateAdminBranch()
    {
        $adminBranch = $this->makeAdminBranch();
        $fakeAdminBranch = $this->fakeAdminBranchData();
        $updatedAdminBranch = $this->adminBranchRepo->update($fakeAdminBranch, $adminBranch->id);
        $this->assertModelData($fakeAdminBranch, $updatedAdminBranch->toArray());
        $dbAdminBranch = $this->adminBranchRepo->find($adminBranch->id);
        $this->assertModelData($fakeAdminBranch, $dbAdminBranch->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteAdminBranch()
    {
        $adminBranch = $this->makeAdminBranch();
        $resp = $this->adminBranchRepo->delete($adminBranch->id);
        $this->assertTrue($resp);
        $this->assertNull(AdminBranch::find($adminBranch->id), 'AdminBranch should not exist in DB');
    }
}
