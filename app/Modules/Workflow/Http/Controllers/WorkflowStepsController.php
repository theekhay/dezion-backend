<?php

namespace App\Modules\Workflow\Http\Controllers;

use App\Modules\Workflow\Http\Requests\CreateWorkflowStepsRequest;
use App\Modules\Workflow\Http\Requests\UpdateWorkflowStepsRequest;
use App\Modules\Workflow\Repositories\WorkflowStepsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class WorkflowStepsController extends AppBaseController
{
    /** @var  WorkflowStepsRepository */
    private $workflowStepsRepository;

    public function __construct(WorkflowStepsRepository $workflowStepsRepo)
    {
        $this->workflowStepsRepository = $workflowStepsRepo;
    }

    /**
     * Display a listing of the WorkflowSteps.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->workflowStepsRepository->pushCriteria(new RequestCriteria($request));
        $workflowSteps = $this->workflowStepsRepository->all();

        return view('workflow_steps.index')
            ->with('workflowSteps', $workflowSteps);
    }

    /**
     * Show the form for creating a new WorkflowSteps.
     *
     * @return Response
     */
    public function create()
    {
        return view('workflow_steps.create');
    }

    /**
     * Store a newly created WorkflowSteps in storage.
     *
     * @param CreateWorkflowStepsRequest $request
     *
     * @return Response
     */
    public function store(CreateWorkflowStepsRequest $request)
    {
        $input = $request->all();

        $workflowSteps = $this->workflowStepsRepository->create($input);

        Flash::success('Workflow Steps saved successfully.');

        return redirect(route('workflowSteps.index'));
    }

    /**
     * Display the specified WorkflowSteps.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $workflowSteps = $this->workflowStepsRepository->findWithoutFail($id);

        if (empty($workflowSteps)) {
            Flash::error('Workflow Steps not found');

            return redirect(route('workflowSteps.index'));
        }

        return view('workflow_steps.show')->with('workflowSteps', $workflowSteps);
    }

    /**
     * Show the form for editing the specified WorkflowSteps.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $workflowSteps = $this->workflowStepsRepository->findWithoutFail($id);

        if (empty($workflowSteps)) {
            Flash::error('Workflow Steps not found');

            return redirect(route('workflowSteps.index'));
        }

        return view('workflow_steps.edit')->with('workflowSteps', $workflowSteps);
    }

    /**
     * Update the specified WorkflowSteps in storage.
     *
     * @param  int              $id
     * @param UpdateWorkflowStepsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWorkflowStepsRequest $request)
    {
        $workflowSteps = $this->workflowStepsRepository->findWithoutFail($id);

        if (empty($workflowSteps)) {
            Flash::error('Workflow Steps not found');

            return redirect(route('workflowSteps.index'));
        }

        $workflowSteps = $this->workflowStepsRepository->update($request->all(), $id);

        Flash::success('Workflow Steps updated successfully.');

        return redirect(route('workflowSteps.index'));
    }

    /**
     * Remove the specified WorkflowSteps from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $workflowSteps = $this->workflowStepsRepository->findWithoutFail($id);

        if (empty($workflowSteps)) {
            Flash::error('Workflow Steps not found');

            return redirect(route('workflowSteps.index'));
        }

        $this->workflowStepsRepository->delete($id);

        Flash::success('Workflow Steps deleted successfully.');

        return redirect(route('workflowSteps.index'));
    }
}
