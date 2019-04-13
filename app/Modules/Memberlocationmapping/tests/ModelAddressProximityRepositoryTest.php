<?php

use App\Modules\memberlocationmapping\Models\ModelAddressProximity;
use App\Modules\memberlocationmapping\Repositories\ModelAddressProximityRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ModelAddressProximityRepositoryTest extends TestCase
{
    use MakeModelAddressProximityTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ModelAddressProximityRepository
     */
    protected $modelAddressProximityRepo;

    public function setUp()
    {
        parent::setUp();
        $this->modelAddressProximityRepo = App::make(ModelAddressProximityRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateModelAddressProximity()
    {
        $modelAddressProximity = $this->fakeModelAddressProximityData();
        $createdModelAddressProximity = $this->modelAddressProximityRepo->create($modelAddressProximity);
        $createdModelAddressProximity = $createdModelAddressProximity->toArray();
        $this->assertArrayHasKey('id', $createdModelAddressProximity);
        $this->assertNotNull($createdModelAddressProximity['id'], 'Created ModelAddressProximity must have id specified');
        $this->assertNotNull(ModelAddressProximity::find($createdModelAddressProximity['id']), 'ModelAddressProximity with given id must be in DB');
        $this->assertModelData($modelAddressProximity, $createdModelAddressProximity);
    }

    /**
     * @test read
     */
    public function testReadModelAddressProximity()
    {
        $modelAddressProximity = $this->makeModelAddressProximity();
        $dbModelAddressProximity = $this->modelAddressProximityRepo->find($modelAddressProximity->id);
        $dbModelAddressProximity = $dbModelAddressProximity->toArray();
        $this->assertModelData($modelAddressProximity->toArray(), $dbModelAddressProximity);
    }

    /**
     * @test update
     */
    public function testUpdateModelAddressProximity()
    {
        $modelAddressProximity = $this->makeModelAddressProximity();
        $fakeModelAddressProximity = $this->fakeModelAddressProximityData();
        $updatedModelAddressProximity = $this->modelAddressProximityRepo->update($fakeModelAddressProximity, $modelAddressProximity->id);
        $this->assertModelData($fakeModelAddressProximity, $updatedModelAddressProximity->toArray());
        $dbModelAddressProximity = $this->modelAddressProximityRepo->find($modelAddressProximity->id);
        $this->assertModelData($fakeModelAddressProximity, $dbModelAddressProximity->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteModelAddressProximity()
    {
        $modelAddressProximity = $this->makeModelAddressProximity();
        $resp = $this->modelAddressProximityRepo->delete($modelAddressProximity->id);
        $this->assertTrue($resp);
        $this->assertNull(ModelAddressProximity::find($modelAddressProximity->id), 'ModelAddressProximity should not exist in DB');
    }
}
