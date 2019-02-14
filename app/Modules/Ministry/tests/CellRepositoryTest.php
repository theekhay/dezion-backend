<?php

use App\Modules\ministry\Models\Cell;
use App\Modules\ministry\Repositories\CellRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CellRepositoryTest extends TestCase
{
    use MakeCellTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var CellRepository
     */
    protected $cellRepo;

    public function setUp()
    {
        parent::setUp();
        $this->cellRepo = App::make(CellRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateCell()
    {
        $cell = $this->fakeCellData();
        $createdCell = $this->cellRepo->create($cell);
        $createdCell = $createdCell->toArray();
        $this->assertArrayHasKey('id', $createdCell);
        $this->assertNotNull($createdCell['id'], 'Created Cell must have id specified');
        $this->assertNotNull(Cell::find($createdCell['id']), 'Cell with given id must be in DB');
        $this->assertModelData($cell, $createdCell);
    }

    /**
     * @test read
     */
    public function testReadCell()
    {
        $cell = $this->makeCell();
        $dbCell = $this->cellRepo->find($cell->id);
        $dbCell = $dbCell->toArray();
        $this->assertModelData($cell->toArray(), $dbCell);
    }

    /**
     * @test update
     */
    public function testUpdateCell()
    {
        $cell = $this->makeCell();
        $fakeCell = $this->fakeCellData();
        $updatedCell = $this->cellRepo->update($fakeCell, $cell->id);
        $this->assertModelData($fakeCell, $updatedCell->toArray());
        $dbCell = $this->cellRepo->find($cell->id);
        $this->assertModelData($fakeCell, $dbCell->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteCell()
    {
        $cell = $this->makeCell();
        $resp = $this->cellRepo->delete($cell->id);
        $this->assertTrue($resp);
        $this->assertNull(Cell::find($cell->id), 'Cell should not exist in DB');
    }
}
