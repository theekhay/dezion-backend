<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ChurchApiTest extends TestCase
{
    use MakeChurchTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateChurch()
    {
        $church = $this->fakeChurchData();
        $this->json('POST', '/api/v1/churches', $church);

        $this->assertApiResponse($church);
    }

    /**
     * @test
     */
    public function testReadChurch()
    {
        $church = $this->makeChurch();
        $this->json('GET', '/api/v1/churches/'.$church->id);

        $this->assertApiResponse($church->toArray());
    }

    /**
     * @test
     */
    public function testUpdateChurch()
    {
        $church = $this->makeChurch();
        $editedChurch = $this->fakeChurchData();

        $this->json('PUT', '/api/v1/churches/'.$church->id, $editedChurch);

        $this->assertApiResponse($editedChurch);
    }

    /**
     * @test
     */
    public function testDeleteChurch()
    {
        $church = $this->makeChurch();
        $this->json('DELETE', '/api/v1/churches/'.$church->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/churches/'.$church->id);

        $this->assertResponseStatus(404);
    }
}
