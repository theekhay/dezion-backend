<?php

namespace App\Modules\Servicemanager\Http\Controllers\API;

use App\Modules\Servicemanager\Http\Requests\API\CreateServiceDataCategoryAPIRequest;
use App\Modules\Servicemanager\Http\Requests\API\UpdateServiceDataCategoryAPIRequest;
use App\Modules\Servicemanager\Models\ServiceDataCategory;
use App\Modules\Servicemanager\Repositories\ServiceDataCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Modules\ServiceManager\Http\Resources\ServiceDataCategoryResource;

/**
 * Class ServiceDataCategoryController
 * @package App\Modules\Servicemanager\Http\Controllers\API
 */

class ServiceDataCategoryAPIController extends AppBaseController
{
    /** @var  ServiceDataCategoryRepository */
    private $serviceDataCategoryRepository;

    public function __construct(ServiceDataCategoryRepository $serviceDataCategoryRepo)
    {
        $this->serviceDataCategoryRepository = $serviceDataCategoryRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/serviceDataCategories",
     *      summary="Get a listing of the ServiceDataCategories.",
     *      tags={"ServiceDataCategory"},
     *      description="Get all ServiceDataCategories",
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
     *                  @SWG\Items(ref="#/definitions/ServiceDataCategory")
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
        $this->serviceDataCategoryRepository->pushCriteria(new RequestCriteria($request));
        $this->serviceDataCategoryRepository->pushCriteria(new LimitOffsetCriteria($request));
        $serviceDataCategories = $this->serviceDataCategoryRepository->all();

        return $this->sendResponse($serviceDataCategories->toArray(), 'Service Data Categories retrieved successfully');
    }

    /**
     * @param CreateServiceDataCategoryAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/serviceDataCategories",
     *      summary="Store a newly created ServiceDataCategory in storage",
     *      tags={"ServiceDataCategory"},
     *      description="Store ServiceDataCategory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ServiceDataCategory that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ServiceDataCategory")
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
     *                  ref="#/definitions/ServiceDataCategory"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateServiceDataCategoryAPIRequest $request)
    {
        $input = $request->all();
        $serviceDataCategories = $this->serviceDataCategoryRepository->create($input);
        return $this->sendResponse( new ServiceDataCategoryResource($serviceDataCategories), 'Service Data Category saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/serviceDataCategories/{id}",
     *      summary="Display the specified ServiceDataCategory",
     *      tags={"ServiceDataCategory"},
     *      description="Get ServiceDataCategory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ServiceDataCategory",
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
     *                  ref="#/definitions/ServiceDataCategory"
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
        /** @var ServiceDataCategory $serviceDataCategory */
        $serviceDataCategory = $this->serviceDataCategoryRepository->findWithoutFail($id);

        if (empty($serviceDataCategory)) {
            return $this->sendError('Service Data Category not found');
        }

        return $this->sendResponse($serviceDataCategory->toArray(), 'Service Data Category retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateServiceDataCategoryAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/serviceDataCategories/{id}",
     *      summary="Update the specified ServiceDataCategory in storage",
     *      tags={"ServiceDataCategory"},
     *      description="Update ServiceDataCategory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ServiceDataCategory",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ServiceDataCategory that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ServiceDataCategory")
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
     *                  ref="#/definitions/ServiceDataCategory"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateServiceDataCategoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var ServiceDataCategory $serviceDataCategory */
        $serviceDataCategory = $this->serviceDataCategoryRepository->findWithoutFail($id);

        if (empty($serviceDataCategory)) {
            return $this->sendError('Service Data Category not found');
        }

        $serviceDataCategory = $this->serviceDataCategoryRepository->update($input, $id);

        return $this->sendResponse($serviceDataCategory->toArray(), 'ServiceDataCategory updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/serviceDataCategories/{id}",
     *      summary="Remove the specified ServiceDataCategory from storage",
     *      tags={"ServiceDataCategory"},
     *      description="Delete ServiceDataCategory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ServiceDataCategory",
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
        /** @var ServiceDataCategory $serviceDataCategory */
        $serviceDataCategory = $this->serviceDataCategoryRepository->findWithoutFail($id);

        if (empty($serviceDataCategory)) {
            return $this->sendError('Service Data Category not found');
        }

        $serviceDataCategory->delete();

        return $this->sendResponse($id, 'Service Data Category deleted successfully');
    }
}
