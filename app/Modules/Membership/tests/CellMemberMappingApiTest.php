<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CellMemberMappingApiTest extends TestCase
{
    use MakeCellMemberMappingTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateCellMemberMapping()
    {
        $cellMemberMapping = $this->fakeCellMemberMappingData();
        $this->json('POST', '/api/v1/cellMemberMappings', $cellMemberMapping);

        $this->assertApiResponse($cellMemberMapping);
    }

    /**
     * @test
     */
    public function testReadCellMemberMapping()
    {
        $cellMemberMapping = $this->makeCellMemberMapping();
        $this->json('GET', '/api/v1/cellMemberMappings/'.$cellMemberMapping->id);

        $this->assertApiResponse($cellMemberMapping->toArray());
    }

    /**
     * @test
     */
    public function testUpdateCellMemberMapping()
    {
        $cellMemberMapping = $this->makeCellMemberMapping();
        $editedCellMemberMapping = $this->fakeCellMemberMappingData();

        $this->json('PUT', '/api/v1/cellMemberMappings/'.$cellMemberMapping->id, $editedCellMemberMapping);

        $this->assertApiResponse($editedCellMemberMapping);
    }

    /**
     * @test
     */
    public function testDeleteCellMemberMapping()
    {
        $cellMemberMapping = $this->makeCellMemberMapping();
        $this->json('DELETE', '/api/v1/cellMemberMappings/'.$cellMemberMapping->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/cellMemberMappings/'.$cellMemberMapping->id);

        $this->assertResponseStatus(404);
    }
}
