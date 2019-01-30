<?php

use App\Modules\ministry\Models\Zone;
use App\Modules\ministry\Repositories\ZoneRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ZoneRepositoryTest extends TestCase
{
    use MakeZoneTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ZoneRepository
     */
    protected $zoneRepo;

    public function setUp()
    {
        parent::setUp();
        $this->zoneRepo = App::make(ZoneRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateZone()
    {
        $zone = $this->fakeZoneData();
        $createdZone = $this->zoneRepo->create($zone);
        $createdZone = $createdZone->toArray();
        $this->assertArrayHasKey('id', $createdZone);
        $this->assertNotNull($createdZone['id'], 'Created Zone must have id specified');
        $this->assertNotNull(Zone::find($createdZone['id']), 'Zone with given id must be in DB');
        $this->assertModelData($zone, $createdZone);
    }

    /**
     * @test read
     */
    public function testReadZone()
    {
        $zone = $this->makeZone();
        $dbZone = $this->zoneRepo->find($zone->id);
        $dbZone = $dbZone->toArray();
        $this->assertModelData($zone->toArray(), $dbZone);
    }

    /**
     * @test update
     */
    public function testUpdateZone()
    {
        $zone = $this->makeZone();
        $fakeZone = $this->fakeZoneData();
        $updatedZone = $this->zoneRepo->update($fakeZone, $zone->id);
        $this->assertModelData($fakeZone, $updatedZone->toArray());
        $dbZone = $this->zoneRepo->find($zone->id);
        $this->assertModelData($fakeZone, $dbZone->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteZone()
    {
        $zone = $this->makeZone();
        $resp = $this->zoneRepo->delete($zone->id);
        $this->assertTrue($resp);
        $this->assertNull(Zone::find($zone->id), 'Zone should not exist in DB');
    }
}
