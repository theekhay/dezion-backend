<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class WorkflowApiTest extends TestCase
{
    use MakeWorkflowTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateWorkflow()
    {
        $workflow = $this->fakeWorkflowData();
        $this->json('POST', '/api/v1/workflows', $workflow);

        $this->assertApiResponse($workflow);
    }

    /**
     * @test
     */
    public function testReadWorkflow()
    {
        $workflow = $this->makeWorkflow();
        $this->json('GET', '/api/v1/workflows/'.$workflow->id);

        $this->assertApiResponse($workflow->toArray());
    }

    /**
     * @test
     */
    public function testUpdateWorkflow()
    {
        $workflow = $this->makeWorkflow();
        $editedWorkflow = $this->fakeWorkflowData();

        $this->json('PUT', '/api/v1/workflows/'.$workflow->id, $editedWorkflow);

        $this->assertApiResponse($editedWorkflow);
    }

    /**
     * @test
     */
    public function testDeleteWorkflow()
    {
        $workflow = $this->makeWorkflow();
        $this->json('DELETE', '/api/v1/workflows/'.$workflow->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/workflows/'.$workflow->id);

        $this->assertResponseStatus(404);
    }
}
