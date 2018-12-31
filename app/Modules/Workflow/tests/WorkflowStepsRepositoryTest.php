<?php

use App\Modules\Workflow\Models\WorkflowSteps;
use App\Modules\Workflow\Repositories\WorkflowStepsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class WorkflowStepsRepositoryTest extends TestCase
{
    use MakeWorkflowStepsTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var WorkflowStepsRepository
     */
    protected $workflowStepsRepo;

    public function setUp()
    {
        parent::setUp();
        $this->workflowStepsRepo = App::make(WorkflowStepsRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateWorkflowSteps()
    {
        $workflowSteps = $this->fakeWorkflowStepsData();
        $createdWorkflowSteps = $this->workflowStepsRepo->create($workflowSteps);
        $createdWorkflowSteps = $createdWorkflowSteps->toArray();
        $this->assertArrayHasKey('id', $createdWorkflowSteps);
        $this->assertNotNull($createdWorkflowSteps['id'], 'Created WorkflowSteps must have id specified');
        $this->assertNotNull(WorkflowSteps::find($createdWorkflowSteps['id']), 'WorkflowSteps with given id must be in DB');
        $this->assertModelData($workflowSteps, $createdWorkflowSteps);
    }

    /**
     * @test read
     */
    public function testReadWorkflowSteps()
    {
        $workflowSteps = $this->makeWorkflowSteps();
        $dbWorkflowSteps = $this->workflowStepsRepo->find($workflowSteps->id);
        $dbWorkflowSteps = $dbWorkflowSteps->toArray();
        $this->assertModelData($workflowSteps->toArray(), $dbWorkflowSteps);
    }

    /**
     * @test update
     */
    public function testUpdateWorkflowSteps()
    {
        $workflowSteps = $this->makeWorkflowSteps();
        $fakeWorkflowSteps = $this->fakeWorkflowStepsData();
        $updatedWorkflowSteps = $this->workflowStepsRepo->update($fakeWorkflowSteps, $workflowSteps->id);
        $this->assertModelData($fakeWorkflowSteps, $updatedWorkflowSteps->toArray());
        $dbWorkflowSteps = $this->workflowStepsRepo->find($workflowSteps->id);
        $this->assertModelData($fakeWorkflowSteps, $dbWorkflowSteps->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteWorkflowSteps()
    {
        $workflowSteps = $this->makeWorkflowSteps();
        $resp = $this->workflowStepsRepo->delete($workflowSteps->id);
        $this->assertTrue($resp);
        $this->assertNull(WorkflowSteps::find($workflowSteps->id), 'WorkflowSteps should not exist in DB');
    }
}
