<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CellApiTest extends TestCase
{
    use MakeCellTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateCell()
    {
        $cell = $this->fakeCellData();
        $this->json('POST', '/api/v1/cells', $cell);

        $this->assertApiResponse($cell);
    }

    /**
     * @test
     */
    public function testReadCell()
    {
        $cell = $this->makeCell();
        $this->json('GET', '/api/v1/cells/'.$cell->id);

        $this->assertApiResponse($cell->toArray());
    }

    /**
     * @test
     */
    public function testUpdateCell()
    {
        $cell = $this->makeCell();
        $editedCell = $this->fakeCellData();

        $this->json('PUT', '/api/v1/cells/'.$cell->id, $editedCell);

        $this->assertApiResponse($editedCell);
    }

    /**
     * @test
     */
    public function testDeleteCell()
    {
        $cell = $this->makeCell();
        $this->json('DELETE', '/api/v1/cells/'.$cell->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/cells/'.$cell->id);

        $this->assertResponseStatus(404);
    }
}
