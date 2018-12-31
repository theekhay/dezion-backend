<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class WorkflowStepsApiTest extends TestCase
{
    use MakeWorkflowStepsTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateWorkflowSteps()
    {
        $workflowSteps = $this->fakeWorkflowStepsData();
        $this->json('POST', '/api/v1/workflowSteps', $workflowSteps);

        $this->assertApiResponse($workflowSteps);
    }

    /**
     * @test
     */
    public function testReadWorkflowSteps()
    {
        $workflowSteps = $this->makeWorkflowSteps();
        $this->json('GET', '/api/v1/workflowSteps/'.$workflowSteps->id);

        $this->assertApiResponse($workflowSteps->toArray());
    }

    /**
     * @test
     */
    public function testUpdateWorkflowSteps()
    {
        $workflowSteps = $this->makeWorkflowSteps();
        $editedWorkflowSteps = $this->fakeWorkflowStepsData();

        $this->json('PUT', '/api/v1/workflowSteps/'.$workflowSteps->id, $editedWorkflowSteps);

        $this->assertApiResponse($editedWorkflowSteps);
    }

    /**
     * @test
     */
    public function testDeleteWorkflowSteps()
    {
        $workflowSteps = $this->makeWorkflowSteps();
        $this->json('DELETE', '/api/v1/workflowSteps/'.$workflowSteps->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/workflowSteps/'.$workflowSteps->id);

        $this->assertResponseStatus(404);
    }
}
