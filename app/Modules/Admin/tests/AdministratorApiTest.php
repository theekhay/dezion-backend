<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdministratorApiTest extends TestCase
{
    use MakeAdministratorTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateAdministrator()
    {
        $administrator = $this->fakeAdministratorData();
        $this->json('POST', '/api/v1/administrators', $administrator);

        $this->assertApiResponse($administrator);
    }

    /**
     * @test
     */
    public function testReadAdministrator()
    {
        $administrator = $this->makeAdministrator();
        $this->json('GET', '/api/v1/administrators/'.$administrator->id);

        $this->assertApiResponse($administrator->toArray());
    }

    /**
     * @test
     */
    public function testUpdateAdministrator()
    {
        $administrator = $this->makeAdministrator();
        $editedAdministrator = $this->fakeAdministratorData();

        $this->json('PUT', '/api/v1/administrators/'.$administrator->id, $editedAdministrator);

        $this->assertApiResponse($editedAdministrator);
    }

    /**
     * @test
     */
    public function testDeleteAdministrator()
    {
        $administrator = $this->makeAdministrator();
        $this->json('DELETE', '/api/v1/administrators/'.$administrator->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/administrators/'.$administrator->id);

        $this->assertResponseStatus(404);
    }
}
