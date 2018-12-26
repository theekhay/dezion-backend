<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BulkMemberImportApiTest extends TestCase
{
    use MakeBulkMemberImportTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateBulkMemberImport()
    {
        $bulkMemberImport = $this->fakeBulkMemberImportData();
        $this->json('POST', '/api/v1/bulkMemberImports', $bulkMemberImport);

        $this->assertApiResponse($bulkMemberImport);
    }

    /**
     * @test
     */
    public function testReadBulkMemberImport()
    {
        $bulkMemberImport = $this->makeBulkMemberImport();
        $this->json('GET', '/api/v1/bulkMemberImports/'.$bulkMemberImport->id);

        $this->assertApiResponse($bulkMemberImport->toArray());
    }

    /**
     * @test
     */
    public function testUpdateBulkMemberImport()
    {
        $bulkMemberImport = $this->makeBulkMemberImport();
        $editedBulkMemberImport = $this->fakeBulkMemberImportData();

        $this->json('PUT', '/api/v1/bulkMemberImports/'.$bulkMemberImport->id, $editedBulkMemberImport);

        $this->assertApiResponse($editedBulkMemberImport);
    }

    /**
     * @test
     */
    public function testDeleteBulkMemberImport()
    {
        $bulkMemberImport = $this->makeBulkMemberImport();
        $this->json('DELETE', '/api/v1/bulkMemberImports/'.$bulkMemberImport->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/bulkMemberImports/'.$bulkMemberImport->id);

        $this->assertResponseStatus(404);
    }
}
