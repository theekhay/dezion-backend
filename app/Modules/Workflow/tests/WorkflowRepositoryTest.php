<?php

use App\Modules\Workflow\Models\Workflow;
use App\Modules\Workflow\Repositories\WorkflowRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class WorkflowRepositoryTest extends TestCase
{
    use MakeWorkflowTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var WorkflowRepository
     */
    protected $workflowRepo;

    public function setUp()
    {
        parent::setUp();
        $this->workflowRepo = App::make(WorkflowRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateWorkflow()
    {
        $workflow = $this->fakeWorkflowData();
        $createdWorkflow = $this->workflowRepo->create($workflow);
        $createdWorkflow = $createdWorkflow->toArray();
        $this->assertArrayHasKey('id', $createdWorkflow);
        $this->assertNotNull($createdWorkflow['id'], 'Created Workflow must have id specified');
        $this->assertNotNull(Workflow::find($createdWorkflow['id']), 'Workflow with given id must be in DB');
        $this->assertModelData($workflow, $createdWorkflow);
    }

    /**
     * @test read
     */
    public function testReadWorkflow()
    {
        $workflow = $this->makeWorkflow();
        $dbWorkflow = $this->workflowRepo->find($workflow->id);
        $dbWorkflow = $dbWorkflow->toArray();
        $this->assertModelData($workflow->toArray(), $dbWorkflow);
    }

    /**
     * @test update
     */
    public function testUpdateWorkflow()
    {
        $workflow = $this->makeWorkflow();
        $fakeWorkflow = $this->fakeWorkflowData();
        $updatedWorkflow = $this->workflowRepo->update($fakeWorkflow, $workflow->id);
        $this->assertModelData($fakeWorkflow, $updatedWorkflow->toArray());
        $dbWorkflow = $this->workflowRepo->find($workflow->id);
        $this->assertModelData($fakeWorkflow, $dbWorkflow->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteWorkflow()
    {
        $workflow = $this->makeWorkflow();
        $resp = $this->workflowRepo->delete($workflow->id);
        $this->assertTrue($resp);
        $this->assertNull(Workflow::find($workflow->id), 'Workflow should not exist in DB');
    }
}
