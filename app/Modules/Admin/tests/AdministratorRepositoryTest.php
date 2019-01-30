<?php

use App\Modules\Admin\Models\Administrator;
use App\Modules\Admin\Repositories\AdministratorRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdministratorRepositoryTest extends TestCase
{
    use MakeAdministratorTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var AdministratorRepository
     */
    protected $administratorRepo;

    public function setUp()
    {
        parent::setUp();
        $this->administratorRepo = App::make(AdministratorRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateAdministrator()
    {
        $administrator = $this->fakeAdministratorData();
        $createdAdministrator = $this->administratorRepo->create($administrator);
        $createdAdministrator = $createdAdministrator->toArray();
        $this->assertArrayHasKey('id', $createdAdministrator);
        $this->assertNotNull($createdAdministrator['id'], 'Created Administrator must have id specified');
        $this->assertNotNull(Administrator::find($createdAdministrator['id']), 'Administrator with given id must be in DB');
        $this->assertModelData($administrator, $createdAdministrator);
    }

    /**
     * @test read
     */
    public function testReadAdministrator()
    {
        $administrator = $this->makeAdministrator();
        $dbAdministrator = $this->administratorRepo->find($administrator->id);
        $dbAdministrator = $dbAdministrator->toArray();
        $this->assertModelData($administrator->toArray(), $dbAdministrator);
    }

    /**
     * @test update
     */
    public function testUpdateAdministrator()
    {
        $administrator = $this->makeAdministrator();
        $fakeAdministrator = $this->fakeAdministratorData();
        $updatedAdministrator = $this->administratorRepo->update($fakeAdministrator, $administrator->id);
        $this->assertModelData($fakeAdministrator, $updatedAdministrator->toArray());
        $dbAdministrator = $this->administratorRepo->find($administrator->id);
        $this->assertModelData($fakeAdministrator, $dbAdministrator->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteAdministrator()
    {
        $administrator = $this->makeAdministrator();
        $resp = $this->administratorRepo->delete($administrator->id);
        $this->assertTrue($resp);
        $this->assertNull(Administrator::find($administrator->id), 'Administrator should not exist in DB');
    }
}
