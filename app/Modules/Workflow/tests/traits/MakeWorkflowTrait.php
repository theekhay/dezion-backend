<?php

use Faker\Factory as Faker;
use App\Modules\Workflow\Models\Workflow;
use App\Modules\Workflow\Repositories\WorkflowRepository;

trait MakeWorkflowTrait
{
    /**
     * Create fake instance of Workflow and save it in database
     *
     * @param array $workflowFields
     * @return Workflow
     */
    public function makeWorkflow($workflowFields = [])
    {
        /** @var WorkflowRepository $workflowRepo */
        $workflowRepo = App::make(WorkflowRepository::class);
        $theme = $this->fakeWorkflowData($workflowFields);
        return $workflowRepo->create($theme);
    }

    /**
     * Get fake instance of Workflow
     *
     * @param array $workflowFields
     * @return Workflow
     */
    public function fakeWorkflow($workflowFields = [])
    {
        return new Workflow($this->fakeWorkflowData($workflowFields));
    }

    /**
     * Get fake data of Workflow
     *
     * @param array $postFields
     * @return array
     */
    public function fakeWorkflowData($workflowFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $workflowFields);
    }
}
