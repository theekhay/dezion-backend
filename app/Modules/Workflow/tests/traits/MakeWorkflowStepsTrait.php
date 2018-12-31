<?php

use Faker\Factory as Faker;
use App\Modules\Workflow\Models\WorkflowSteps;
use App\Modules\Workflow\Repositories\WorkflowStepsRepository;

trait MakeWorkflowStepsTrait
{
    /**
     * Create fake instance of WorkflowSteps and save it in database
     *
     * @param array $workflowStepsFields
     * @return WorkflowSteps
     */
    public function makeWorkflowSteps($workflowStepsFields = [])
    {
        /** @var WorkflowStepsRepository $workflowStepsRepo */
        $workflowStepsRepo = App::make(WorkflowStepsRepository::class);
        $theme = $this->fakeWorkflowStepsData($workflowStepsFields);
        return $workflowStepsRepo->create($theme);
    }

    /**
     * Get fake instance of WorkflowSteps
     *
     * @param array $workflowStepsFields
     * @return WorkflowSteps
     */
    public function fakeWorkflowSteps($workflowStepsFields = [])
    {
        return new WorkflowSteps($this->fakeWorkflowStepsData($workflowStepsFields));
    }

    /**
     * Get fake data of WorkflowSteps
     *
     * @param array $postFields
     * @return array
     */
    public function fakeWorkflowStepsData($workflowStepsFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $workflowStepsFields);
    }
}
