<?php

namespace App\Modules\Servicemanager\Http\Controllers\API;

use App\Modules\Servicemanager\Http\Requests\API\CreateServiceDataComponentAPIRequest;
use App\Modules\Servicemanager\Http\Requests\API\UpdateServiceDataComponentAPIRequest;
use App\Modules\Servicemanager\Models\ServiceDataComponent;
use App\Modules\Servicemanager\Repositories\ServiceDataComponentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Modules\ServiceManager\Http\Resources\ServiceDataComponentResource;

/**
 * Class ServiceDataComponentController
 * @package App\Modules\Servicemanager\Http\Controllers\API
 * @group Service Management
 */

class ServiceDataComponentAPIController extends AppBaseController
{
    /** @var  ServiceDataComponentRepository */
    private $serviceDataComponentRepository;

    public function __construct(ServiceDataComponentRepository $serviceDataComponentRepo)
    {
        $this->serviceDataComponentRepository = $serviceDataComponentRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/serviceDataComponents",
     *      summary="Get a listing of the ServiceDataComponents.",
     *      tags={"ServiceDataComponent"},
     *      description="Get all ServiceDataComponents",
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
     *                  @SWG\Items(ref="#/definitions/ServiceDataComponent")
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
        $this->serviceDataComponentRepository->pushCriteria(new RequestCriteria($request));
        $this->serviceDataComponentRepository->pushCriteria(new LimitOffsetCriteria($request));
        $serviceDataComponents = $this->serviceDataComponentRepository->paginate(15);

        return $this->sendResponse(  ServiceDataComponentResource::collection($serviceDataComponents), 'Service Data Components retrieved successfully');
    }

    /**
     * @param CreateServiceDataComponentAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/serviceDataComponents",
     *      summary="Store a newly created ServiceDataComponent in storage",
     *      tags={"ServiceDataComponent"},
     *      description="Store ServiceDataComponent",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ServiceDataComponent that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ServiceDataComponent")
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
     *                  ref="#/definitions/ServiceDataComponent"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateServiceDataComponentAPIRequest $request)
    {
        $input = $request->all();
        $serviceDataComponents = $this->serviceDataComponentRepository->create($input);
        return  $this->sendResponse( new ServiceDataComponentResource( $serviceDataComponents ), 'Service Data Component saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/serviceDataComponents/{id}",
     *      summary="Display the specified ServiceDataComponent",
     *      tags={"ServiceDataComponent"},
     *      description="Get ServiceDataComponent",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ServiceDataComponent",
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
     *                  ref="#/definitions/ServiceDataComponent"
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
        $serviceDataComponent = $this->serviceDataComponentRepository->findWithoutFail($id);

        if (empty($serviceDataComponent)) {
            return $this->sendError('Service Data Component not found');
        }

        return $this->sendResponse( new ServiceDataComponent( $serviceDataComponent ), 'Service Data Component retrieved successfully');
    }



    /**
     * @param int $id
     * @param UpdateServiceDataComponentAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/serviceDataComponents/{id}",
     *      summary="Update the specified ServiceDataComponent in storage",
     *      tags={"ServiceDataComponent"},
     *      description="Update ServiceDataComponent",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ServiceDataComponent",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ServiceDataComponent that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ServiceDataComponent")
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
     *                  ref="#/definitions/ServiceDataComponent"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateServiceDataComponentAPIRequest $request)
    {
        $input = $request->all();
        $serviceDataComponent = $this->serviceDataComponentRepository->findWithoutFail($id);

        if (empty($serviceDataComponent)) {
            return $this->sendError('Service Data Component not found');
        }

        $serviceDataComponent = $this->serviceDataComponentRepository->update($input, $id);

        return $this->sendResponse($serviceDataComponent->toArray(), 'ServiceDataComponent updated successfully');
    }




    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/serviceDataComponents/{id}",
     *      summary="Remove the specified ServiceDataComponent from storage",
     *      tags={"ServiceDataComponent"},
     *      description="Delete ServiceDataComponent",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ServiceDataComponent",
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
        /** @var ServiceDataComponent $serviceDataComponent */
        $serviceDataComponent = $this->serviceDataComponentRepository->findWithoutFail($id);

        if (empty($serviceDataComponent)) {
            return $this->sendError('Service Data Component not found');
        }

        $serviceDataComponent->delete();

        return $this->sendResponse($id, 'Service Data Component deleted successfully');
    }
}
