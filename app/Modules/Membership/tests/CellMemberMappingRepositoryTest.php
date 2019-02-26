<?php

use App\Modules\Membership\Models\CellMemberMapping;
use App\Modules\Membership\Repositories\CellMemberMappingRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CellMemberMappingRepositoryTest extends TestCase
{
    use MakeCellMemberMappingTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var CellMemberMappingRepository
     */
    protected $cellMemberMappingRepo;

    public function setUp()
    {
        parent::setUp();
        $this->cellMemberMappingRepo = App::make(CellMemberMappingRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateCellMemberMapping()
    {
        $cellMemberMapping = $this->fakeCellMemberMappingData();
        $createdCellMemberMapping = $this->cellMemberMappingRepo->create($cellMemberMapping);
        $createdCellMemberMapping = $createdCellMemberMapping->toArray();
        $this->assertArrayHasKey('id', $createdCellMemberMapping);
        $this->assertNotNull($createdCellMemberMapping['id'], 'Created CellMemberMapping must have id specified');
        $this->assertNotNull(CellMemberMapping::find($createdCellMemberMapping['id']), 'CellMemberMapping with given id must be in DB');
        $this->assertModelData($cellMemberMapping, $createdCellMemberMapping);
    }

    /**
     * @test read
     */
    public function testReadCellMemberMapping()
    {
        $cellMemberMapping = $this->makeCellMemberMapping();
        $dbCellMemberMapping = $this->cellMemberMappingRepo->find($cellMemberMapping->id);
        $dbCellMemberMapping = $dbCellMemberMapping->toArray();
        $this->assertModelData($cellMemberMapping->toArray(), $dbCellMemberMapping);
    }

    /**
     * @test update
     */
    public function testUpdateCellMemberMapping()
    {
        $cellMemberMapping = $this->makeCellMemberMapping();
        $fakeCellMemberMapping = $this->fakeCellMemberMappingData();
        $updatedCellMemberMapping = $this->cellMemberMappingRepo->update($fakeCellMemberMapping, $cellMemberMapping->id);
        $this->assertModelData($fakeCellMemberMapping, $updatedCellMemberMapping->toArray());
        $dbCellMemberMapping = $this->cellMemberMappingRepo->find($cellMemberMapping->id);
        $this->assertModelData($fakeCellMemberMapping, $dbCellMemberMapping->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteCellMemberMapping()
    {
        $cellMemberMapping = $this->makeCellMemberMapping();
        $resp = $this->cellMemberMappingRepo->delete($cellMemberMapping->id);
        $this->assertTrue($resp);
        $this->assertNull(CellMemberMapping::find($cellMemberMapping->id), 'CellMemberMapping should not exist in DB');
    }
}
