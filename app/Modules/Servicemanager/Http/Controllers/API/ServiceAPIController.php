<?php

namespace App\Modules\ServiceManager\Http\Controllers\API;

use App\Modules\ServiceManager\Http\Requests\API\CreateServiceAPIRequest;
use App\Modules\ServiceManager\Http\Requests\API\UpdateServiceAPIRequest;
use App\Modules\ServiceManager\Models\Service;
use App\Modules\ServiceManager\Repositories\ServiceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Modules\Servicemanager\Http\Resources\ServiceResource;

/**
 * Class ServiceController
 * @package App\Modules\ServiceManager\Http\Controllers\API
 * @group Service Management
 */

class ServiceAPIController extends AppBaseController
{
    /** @var  ServiceRepository */
    private $serviceRepository;

    public function __construct(ServiceRepository $serviceRepo)
    {
        $this->serviceRepository = $serviceRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/services",
     *      summary="Get a listing of the Services.",
     *      tags={"Service"},
     *      description="Get all Services",
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
     *                  @SWG\Items(ref="#/definitions/Service")
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
        $this->serviceRepository->pushCriteria(new RequestCriteria($request));
        $this->serviceRepository->pushCriteria(new LimitOffsetCriteria($request));
        $services = $this->serviceRepository->all();

        return $this->sendResponse( ServiceResource::collection($services), 'Services retrieved successfully');
    }

    /**
     * @param CreateServiceAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/services",
     *      summary="Store a newly created Service in storage",
     *      tags={"Service"},
     *      description="Store Service",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Service that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Service")
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
     *                  ref="#/definitions/Service"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateServiceAPIRequest $request)
    {
        $input = $request->all();
        $service = $this->serviceRepository->create($input);
        return $this->sendResponse( new ServiceResource($service), 'Service saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/services/{id}",
     *      summary="Display the specified Service",
     *      tags={"Service"},
     *      description="Get Service",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Service",
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
     *                  ref="#/definitions/Service"
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
        $service = $this->serviceRepository->findWithoutFail($id);

        if (empty($service)) {
            return $this->sendError('Service not found');
        }
        return $this->sendResponse( new ServiceResource($service), 'Service details retrieved successfully!');
    }

    /**
     * @param int $id
     * @param UpdateServiceAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/services/{id}",
     *      summary="Update the specified Service in storage",
     *      tags={"Service"},
     *      description="Update Service",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Service",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Service that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Service")
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
     *                  ref="#/definitions/Service"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateServiceAPIRequest $request)
    {
        $input = $request->all();

        /** @var Service $service */
        $service = $this->serviceRepository->findWithoutFail($id);

        if (empty($service)) {
            return $this->sendError('Service not found');
        }

        $service = $this->serviceRepository->update($input, $id);

        return $this->sendResponse($service->toArray(), 'Service updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/services/{id}",
     *      summary="Remove the specified Service from storage",
     *      tags={"Service"},
     *      description="Delete Service",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Service",
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
        /** @var Service $service */
        $service = $this->serviceRepository->findWithoutFail($id);

        if (empty($service)) {
            return $this->sendError('Service not found');
        }

        $service->delete();

        return $this->sendResponse($id, 'Service deleted successfully');
    }
}
