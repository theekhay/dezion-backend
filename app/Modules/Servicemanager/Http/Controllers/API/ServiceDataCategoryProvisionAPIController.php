<?php

namespace App\Modules\Servicemanager\Http\Controllers\API;

use App\Modules\Servicemanager\Http\Requests\API\CreateServiceDataCategoryProvisionAPIRequest;
use App\Modules\Servicemanager\Http\Requests\API\UpdateServiceDataCategoryProvisionAPIRequest;
use App\Modules\Servicemanager\Models\ServiceDataCategoryProvision;
use App\Modules\Servicemanager\Repositories\ServiceDataCategoryProvisionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Modules\ServiceManager\Http\Resources\ServiceDataCategoryProvisionResource;

/**
 * Class ServiceDataCategoryProvisionController
 * @package App\Modules\Servicemanager\Http\Controllers\API
 * @group Service Management
 */

class ServiceDataCategoryProvisionAPIController extends AppBaseController
{
    /** @var  ServiceDataCategoryProvisionRepository */
    private $serviceDataCategoryProvisionRepository;

    public function __construct(ServiceDataCategoryProvisionRepository $serviceDataCategoryProvisionRepo)
    {
        $this->serviceDataCategoryProvisionRepository = $serviceDataCategoryProvisionRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/serviceDataCategoryProvisions",
     *      summary="Get a listing of the ServiceDataCategoryProvisions.",
     *      tags={"ServiceDataCategoryProvision"},
     *      description="Get all ServiceDataCategoryProvisions",
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
     *                  @SWG\Items(ref="#/definitions/ServiceDataCategoryProvision")
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
        $this->serviceDataCategoryProvisionRepository->pushCriteria(new RequestCriteria($request));
        $this->serviceDataCategoryProvisionRepository->pushCriteria(new LimitOffsetCriteria($request));
        $serviceDataCategoryProvisions = $this->serviceDataCategoryProvisionRepository->paginate(15);

        return $this->sendResponse( ServiceDataCategoryProvisionResource::collection( $serviceDataCategoryProvisions), 'Service Data Category Provisions retrieved successfully');
    }

    /**
     * @param CreateServiceDataCategoryProvisionAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/serviceDataCategoryProvisions",
     *      summary="Store a newly created ServiceDataCategoryProvision in storage",
     *      tags={"ServiceDataCategoryProvision"},
     *      description="Store ServiceDataCategoryProvision",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ServiceDataCategoryProvision that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ServiceDataCategoryProvision")
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
     *                  ref="#/definitions/ServiceDataCategoryProvision"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateServiceDataCategoryProvisionAPIRequest $request)
    {
        $input = $request->all();
        $serviceDataCategoryProvisions = $this->serviceDataCategoryProvisionRepository->create($input);
        return $this->sendResponse( new ServiceDataCategoryProvisionResource($serviceDataCategoryProvisions), 'Service Data Category Provision saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/serviceDataCategoryProvisions/{id}",
     *      summary="Display the specified ServiceDataCategoryProvision",
     *      tags={"ServiceDataCategoryProvision"},
     *      description="Get ServiceDataCategoryProvision",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ServiceDataCategoryProvision",
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
     *                  ref="#/definitions/ServiceDataCategoryProvision"
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
        $serviceDataCategoryProvision = $this->serviceDataCategoryProvisionRepository->findWithoutFail($id);

        if (empty($serviceDataCategoryProvision)) {
            return $this->sendError('Service Data Category Provision not found');
        }

        return $this->sendResponse( new ServiceDataCategoryProvisionResource($serviceDataCategoryProvision), 'Service Data Category Provision retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateServiceDataCategoryProvisionAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/serviceDataCategoryProvisions/{id}",
     *      summary="Update the specified ServiceDataCategoryProvision in storage",
     *      tags={"ServiceDataCategoryProvision"},
     *      description="Update ServiceDataCategoryProvision",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ServiceDataCategoryProvision",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ServiceDataCategoryProvision that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ServiceDataCategoryProvision")
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
     *                  ref="#/definitions/ServiceDataCategoryProvision"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateServiceDataCategoryProvisionAPIRequest $request)
    {
        $input = $request->all();

        /** @var ServiceDataCategoryProvision $serviceDataCategoryProvision */
        $serviceDataCategoryProvision = $this->serviceDataCategoryProvisionRepository->findWithoutFail($id);

        if (empty($serviceDataCategoryProvision)) {
            return $this->sendError('Service Data Category Provision not found');
        }

        $serviceDataCategoryProvision = $this->serviceDataCategoryProvisionRepository->update($input, $id);

        return $this->sendResponse($serviceDataCategoryProvision->toArray(), 'ServiceDataCategoryProvision updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/serviceDataCategoryProvisions/{id}",
     *      summary="Remove the specified ServiceDataCategoryProvision from storage",
     *      tags={"ServiceDataCategoryProvision"},
     *      description="Delete ServiceDataCategoryProvision",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ServiceDataCategoryProvision",
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
        /** @var ServiceDataCategoryProvision $serviceDataCategoryProvision */
        $serviceDataCategoryProvision = $this->serviceDataCategoryProvisionRepository->findWithoutFail($id);

        if (empty($serviceDataCategoryProvision)) {
            return $this->sendError('Service Data Category Provision not found');
        }

        $serviceDataCategoryProvision->delete();

        return $this->sendResponse($id, 'Service Data Category Provision deleted successfully');
    }
}
