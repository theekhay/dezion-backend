<?php

use App\Modules\Membership\Models\BulkMemberImport;
use App\Modules\Membership\Repositories\BulkMemberImportRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BulkMemberImportRepositoryTest extends TestCase
{
    use MakeBulkMemberImportTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var BulkMemberImportRepository
     */
    protected $bulkMemberImportRepo;

    public function setUp()
    {
        parent::setUp();
        $this->bulkMemberImportRepo = App::make(BulkMemberImportRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateBulkMemberImport()
    {
        $bulkMemberImport = $this->fakeBulkMemberImportData();
        $createdBulkMemberImport = $this->bulkMemberImportRepo->create($bulkMemberImport);
        $createdBulkMemberImport = $createdBulkMemberImport->toArray();
        $this->assertArrayHasKey('id', $createdBulkMemberImport);
        $this->assertNotNull($createdBulkMemberImport['id'], 'Created BulkMemberImport must have id specified');
        $this->assertNotNull(BulkMemberImport::find($createdBulkMemberImport['id']), 'BulkMemberImport with given id must be in DB');
        $this->assertModelData($bulkMemberImport, $createdBulkMemberImport);
    }

    /**
     * @test read
     */
    public function testReadBulkMemberImport()
    {
        $bulkMemberImport = $this->makeBulkMemberImport();
        $dbBulkMemberImport = $this->bulkMemberImportRepo->find($bulkMemberImport->id);
        $dbBulkMemberImport = $dbBulkMemberImport->toArray();
        $this->assertModelData($bulkMemberImport->toArray(), $dbBulkMemberImport);
    }

    /**
     * @test update
     */
    public function testUpdateBulkMemberImport()
    {
        $bulkMemberImport = $this->makeBulkMemberImport();
        $fakeBulkMemberImport = $this->fakeBulkMemberImportData();
        $updatedBulkMemberImport = $this->bulkMemberImportRepo->update($fakeBulkMemberImport, $bulkMemberImport->id);
        $this->assertModelData($fakeBulkMemberImport, $updatedBulkMemberImport->toArray());
        $dbBulkMemberImport = $this->bulkMemberImportRepo->find($bulkMemberImport->id);
        $this->assertModelData($fakeBulkMemberImport, $dbBulkMemberImport->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteBulkMemberImport()
    {
        $bulkMemberImport = $this->makeBulkMemberImport();
        $resp = $this->bulkMemberImportRepo->delete($bulkMemberImport->id);
        $this->assertTrue($resp);
        $this->assertNull(BulkMemberImport::find($bulkMemberImport->id), 'BulkMemberImport should not exist in DB');
    }
}
