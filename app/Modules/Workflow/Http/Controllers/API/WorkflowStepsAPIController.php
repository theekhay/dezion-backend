<?php

namespace App\Modules\Workflow\Http\Controllers\API;

use App\Modules\Workflow\Http\Requests\API\CreateWorkflowStepsAPIRequest;
use App\Modules\Workflow\Http\Requests\API\UpdateWorkflowStepsAPIRequest;
use App\Modules\Workflow\Models\WorkflowSteps;
use App\Modules\Workflow\Repositories\WorkflowStepsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class WorkflowStepsController
 * @package App\Modules\Workflow\Http\Controllers\API
 */

class WorkflowStepsAPIController extends AppBaseController
{
    /** @var  WorkflowStepsRepository */
    private $workflowStepsRepository;

    public function __construct(WorkflowStepsRepository $workflowStepsRepo)
    {
        $this->workflowStepsRepository = $workflowStepsRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/workflowSteps",
     *      summary="Get a listing of the WorkflowSteps.",
     *      tags={"WorkflowSteps"},
     *      description="Get all WorkflowSteps",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/WorkflowSteps")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $this->workflowStepsRepository->pushCriteria(new RequestCriteria($request));
        $this->workflowStepsRepository->pushCriteria(new LimitOffsetCriteria($request));
        $workflowSteps = $this->workflowStepsRepository->all();

        return $this->sendResponse($workflowSteps->toArray(), 'Workflow Steps retrieved successfully');
    }

    /**
     * @param CreateWorkflowStepsAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/workflowSteps",
     *      summary="Store a newly created WorkflowSteps in storage",
     *      tags={"WorkflowSteps"},
     *      description="Store WorkflowSteps",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="WorkflowSteps that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/WorkflowSteps")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/WorkflowSteps"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateWorkflowStepsAPIRequest $request)
    {
        $input = $request->all();

        $workflowSteps = $this->workflowStepsRepository->create($input);

        return $this->sendResponse($workflowSteps->toArray(), 'Workflow Steps saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/workflowSteps/{id}",
     *      summary="Display the specified WorkflowSteps",
     *      tags={"WorkflowSteps"},
     *      description="Get WorkflowSteps",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of WorkflowSteps",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/WorkflowSteps"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var WorkflowSteps $workflowSteps */
        $workflowSteps = $this->workflowStepsRepository->findWithoutFail($id);

        if (empty($workflowSteps)) {
            return $this->sendError('Workflow Steps not found');
        }

        return $this->sendResponse($workflowSteps->toArray(), 'Workflow Steps retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateWorkflowStepsAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/workflowSteps/{id}",
     *      summary="Update the specified WorkflowSteps in storage",
     *      tags={"WorkflowSteps"},
     *      description="Update WorkflowSteps",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of WorkflowSteps",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="WorkflowSteps that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/WorkflowSteps")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/WorkflowSteps"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateWorkflowStepsAPIRequest $request)
    {
        $input = $request->all();

        /** @var WorkflowSteps $workflowSteps */
        $workflowSteps = $this->workflowStepsRepository->findWithoutFail($id);

        if (empty($workflowSteps)) {
            return $this->sendError('Workflow Steps not found');
        }

        $workflowSteps = $this->workflowStepsRepository->update($input, $id);

        return $this->sendResponse($workflowSteps->toArray(), 'WorkflowSteps updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/workflowSteps/{id}",
     *      summary="Remove the specified WorkflowSteps from storage",
     *      tags={"WorkflowSteps"},
     *      description="Delete WorkflowSteps",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of WorkflowSteps",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var WorkflowSteps $workflowSteps */
        $workflowSteps = $this->workflowStepsRepository->findWithoutFail($id);

        if (empty($workflowSteps)) {
            return $this->sendError('Workflow Steps not found');
        }

        $workflowSteps->delete();

        return $this->sendResponse($id, 'Workflow Steps deleted successfully');
    }
}
