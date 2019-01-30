<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminBranchApiTest extends TestCase
{
    use MakeAdminBranchTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateAdminBranch()
    {
        $adminBranch = $this->fakeAdminBranchData();
        $this->json('POST', '/api/v1/adminBranches', $adminBranch);

        $this->assertApiResponse($adminBranch);
    }

    /**
     * @test
     */
    public function testReadAdminBranch()
    {
        $adminBranch = $this->makeAdminBranch();
        $this->json('GET', '/api/v1/adminBranches/'.$adminBranch->id);

        $this->assertApiResponse($adminBranch->toArray());
    }

    /**
     * @test
     */
    public function testUpdateAdminBranch()
    {
        $adminBranch = $this->makeAdminBranch();
        $editedAdminBranch = $this->fakeAdminBranchData();

        $this->json('PUT', '/api/v1/adminBranches/'.$adminBranch->id, $editedAdminBranch);

        $this->assertApiResponse($editedAdminBranch);
    }

    /**
     * @test
     */
    public function testDeleteAdminBranch()
    {
        $adminBranch = $this->makeAdminBranch();
        $this->json('DELETE', '/api/v1/adminBranches/'.$adminBranch->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/adminBranches/'.$adminBranch->id);

        $this->assertResponseStatus(404);
    }
}
