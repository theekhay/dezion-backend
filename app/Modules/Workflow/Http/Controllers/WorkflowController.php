<?php

namespace App\Modules\Workflow\Http\Controllers;

use App\Modules\Workflow\Http\Requests\CreateWorkflowRequest;
use App\Modules\Workflow\Http\Requests\UpdateWorkflowRequest;
use App\Modules\Workflow\Repositories\WorkflowRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class WorkflowController extends AppBaseController
{
    /** @var  WorkflowRepository */
    private $workflowRepository;

    public function __construct(WorkflowRepository $workflowRepo)
    {
        $this->workflowRepository = $workflowRepo;
    }

    /**
     * Display a listing of the Workflow.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->workflowRepository->pushCriteria(new RequestCriteria($request));
        $workflows = $this->workflowRepository->all();

        return view('workflows.index')
            ->with('workflows', $workflows);
    }

    /**
     * Show the form for creating a new Workflow.
     *
     * @return Response
     */
    public function create()
    {
        return view('workflows.create');
    }

    /**
     * Store a newly created Workflow in storage.
     *
     * @param CreateWorkflowRequest $request
     *
     * @return Response
     */
    public function store(CreateWorkflowRequest $request)
    {
        $input = $request->all();

        $workflow = $this->workflowRepository->create($input);

        Flash::success('Workflow saved successfully.');

        return redirect(route('workflows.index'));
    }

    /**
     * Display the specified Workflow.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $workflow = $this->workflowRepository->findWithoutFail($id);

        if (empty($workflow)) {
            Flash::error('Workflow not found');

            return redirect(route('workflows.index'));
        }

        return view('workflows.show')->with('workflow', $workflow);
    }

    /**
     * Show the form for editing the specified Workflow.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $workflow = $this->workflowRepository->findWithoutFail($id);

        if (empty($workflow)) {
            Flash::error('Workflow not found');

            return redirect(route('workflows.index'));
        }

        return view('workflows.edit')->with('workflow', $workflow);
    }

    /**
     * Update the specified Workflow in storage.
     *
     * @param  int              $id
     * @param UpdateWorkflowRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWorkflowRequest $request)
    {
        $workflow = $this->workflowRepository->findWithoutFail($id);

        if (empty($workflow)) {
            Flash::error('Workflow not found');

            return redirect(route('workflows.index'));
        }

        $workflow = $this->workflowRepository->update($request->all(), $id);

        Flash::success('Workflow updated successfully.');

        return redirect(route('workflows.index'));
    }

    /**
     * Remove the specified Workflow from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $workflow = $this->workflowRepository->findWithoutFail($id);

        if (empty($workflow)) {
            Flash::error('Workflow not found');

            return redirect(route('workflows.index'));
        }

        $this->workflowRepository->delete($id);

        Flash::success('Workflow deleted successfully.');

        return redirect(route('workflows.index'));
    }
}
