<?php

use App\Modules\Core\Models\Church;
use App\Modules\Core\Repositories\ChurchRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ChurchRepositoryTest extends TestCase
{
    use MakeChurchTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ChurchRepository
     */
    protected $churchRepo;

    public function setUp()
    {
        parent::setUp();
        $this->churchRepo = App::make(ChurchRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateChurch()
    {
        $church = $this->fakeChurchData();
        $createdChurch = $this->churchRepo->create($church);
        $createdChurch = $createdChurch->toArray();
        $this->assertArrayHasKey('id', $createdChurch);
        $this->assertNotNull($createdChurch['id'], 'Created Church must have id specified');
        $this->assertNotNull(Church::find($createdChurch['id']), 'Church with given id must be in DB');
        $this->assertModelData($church, $createdChurch);
    }

    /**
     * @test read
     */
    public function testReadChurch()
    {
        $church = $this->makeChurch();
        $dbChurch = $this->churchRepo->find($church->id);
        $dbChurch = $dbChurch->toArray();
        $this->assertModelData($church->toArray(), $dbChurch);
    }

    /**
     * @test update
     */
    public function testUpdateChurch()
    {
        $church = $this->makeChurch();
        $fakeChurch = $this->fakeChurchData();
        $updatedChurch = $this->churchRepo->update($fakeChurch, $church->id);
        $this->assertModelData($fakeChurch, $updatedChurch->toArray());
        $dbChurch = $this->churchRepo->find($church->id);
        $this->assertModelData($fakeChurch, $dbChurch->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteChurch()
    {
        $church = $this->makeChurch();
        $resp = $this->churchRepo->delete($church->id);
        $this->assertTrue($resp);
        $this->assertNull(Church::find($church->id), 'Church should not exist in DB');
    }
}
