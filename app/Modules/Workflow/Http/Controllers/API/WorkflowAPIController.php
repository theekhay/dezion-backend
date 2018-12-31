<?php

namespace App\Modules\Workflow\Http\Controllers\API;

use App\Modules\Workflow\Http\Requests\API\CreateWorkflowAPIRequest;
use App\Modules\Workflow\Http\Requests\API\UpdateWorkflowAPIRequest;
use App\Modules\Workflow\Models\Workflow;
use App\Modules\Workflow\Repositories\WorkflowRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class WorkflowController
 * @package App\Modules\Workflow\Http\Controllers\API
 */

class WorkflowAPIController extends AppBaseController
{
    /** @var  WorkflowRepository */
    private $workflowRepository;

    public function __construct(WorkflowRepository $workflowRepo)
    {
        $this->workflowRepository = $workflowRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/workflows",
     *      summary="Get a listing of the Workflows.",
     *      tags={"Workflow"},
     *      description="Get all Workflows",
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
     *                  @SWG\Items(ref="#/definitions/Workflow")
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
        $this->workflowRepository->pushCriteria(new RequestCriteria($request));
        $this->workflowRepository->pushCriteria(new LimitOffsetCriteria($request));
        $workflows = $this->workflowRepository->all();

        return $this->sendResponse($workflows->toArray(), 'Workflows retrieved successfully');
    }

    /**
     * @param CreateWorkflowAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/workflows",
     *      summary="Store a newly created Workflow in storage",
     *      tags={"Workflow"},
     *      description="Store Workflow",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Workflow that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Workflow")
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
     *                  ref="#/definitions/Workflow"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateWorkflowAPIRequest $request)
    {
        $input = $request->all();

        $workflows = $this->workflowRepository->create($input);

        return $this->sendResponse($workflows->toArray(), 'Workflow saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/workflows/{id}",
     *      summary="Display the specified Workflow",
     *      tags={"Workflow"},
     *      description="Get Workflow",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Workflow",
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
     *                  ref="#/definitions/Workflow"
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
        /** @var Workflow $workflow */
        $workflow = $this->workflowRepository->findWithoutFail($id);

        if (empty($workflow)) {
            return $this->sendError('Workflow not found');
        }

        return $this->sendResponse($workflow->toArray(), 'Workflow retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateWorkflowAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/workflows/{id}",
     *      summary="Update the specified Workflow in storage",
     *      tags={"Workflow"},
     *      description="Update Workflow",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Workflow",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Workflow that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Workflow")
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
     *                  ref="#/definitions/Workflow"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateWorkflowAPIRequest $request)
    {
        $input = $request->all();

        /** @var Workflow $workflow */
        $workflow = $this->workflowRepository->findWithoutFail($id);

        if (empty($workflow)) {
            return $this->sendError('Workflow not found');
        }

        $workflow = $this->workflowRepository->update($input, $id);

        return $this->sendResponse($workflow->toArray(), 'Workflow updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/workflows/{id}",
     *      summary="Remove the specified Workflow from storage",
     *      tags={"Workflow"},
     *      description="Delete Workflow",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Workflow",
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
        /** @var Workflow $workflow */
        $workflow = $this->workflowRepository->findWithoutFail($id);

        if (empty($workflow)) {
            return $this->sendError('Workflow not found');
        }

        $workflow->delete();

        return $this->sendResponse($id, 'Workflow deleted successfully');
    }
}
