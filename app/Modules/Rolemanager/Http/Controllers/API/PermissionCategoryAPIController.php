<?php

namespace App\Modules\rolemanager\Http\Controllers\API;

use App\Modules\rolemanager\Http\Requests\API\CreatePermissionCategoryAPIRequest;
use App\Modules\rolemanager\Http\Requests\API\UpdatePermissionCategoryAPIRequest;
use App\Modules\rolemanager\Models\PermissionCategory;
use App\Modules\rolemanager\Repositories\PermissionCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Modules\Rolemanager\Http\Resources\PermissionCategoryResource;

/**
 * Class PermissionCategoryController
 * @package App\Modules\rolemanager\Http\Controllers\API
 * @group Role and Permission Management
 */

class PermissionCategoryAPIController extends AppBaseController
{
    /** @var  PermissionCategoryRepository */
    private $permissionCategoryRepository;

    public function __construct(PermissionCategoryRepository $permissionCategoryRepo)
    {
        $this->permissionCategoryRepository = $permissionCategoryRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/permissionCategories",
     *      summary="Get a listing of the PermissionCategories.",
     *      tags={"PermissionCategory"},
     *      description="Get all PermissionCategories",
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
     *                  @SWG\Items(ref="#/definitions/PermissionCategory")
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
        $this->permissionCategoryRepository->pushCriteria(new RequestCriteria($request));
        $this->permissionCategoryRepository->pushCriteria(new LimitOffsetCriteria($request));
        $permissionCategories = $this->permissionCategoryRepository->paginate(50);

        return $this->sendResponse( PermissionCategoryResource::collection( $permissionCategories ), 'Permission Categories retrieved successfully');
    }



    /**
     * @param CreatePermissionCategoryAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/permissionCategories",
     *      summary="Store a newly created PermissionCategory in storage",
     *      tags={"PermissionCategory"},
     *      description="Store PermissionCategory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="PermissionCategory that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/PermissionCategory")
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
     *                  ref="#/definitions/PermissionCategory"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePermissionCategoryAPIRequest $request)
    {
        $input = $request->all();
        $permissionCategories = $this->permissionCategoryRepository->create($input);
        return $this->sendResponse( new PermissionCategoryResource($permissionCategories), 'Permission Category saved successfully');
    }



    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/permissionCategories/{id}",
     *      summary="Display the specified PermissionCategory",
     *      tags={"PermissionCategory"},
     *      description="Get PermissionCategory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of PermissionCategory",
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
     *                  ref="#/definitions/PermissionCategory"
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
        /** @var PermissionCategory $permissionCategory */
        $permissionCategory = $this->permissionCategoryRepository->findWithoutFail($id);

        if (empty($permissionCategory)) {
            return $this->sendError('Permission Category not found');
        }

        return $this->sendResponse( new PermissionCategoryResource($permissionCategory), 'Permission Category retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatePermissionCategoryAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/permissionCategories/{id}",
     *      summary="Update the specified PermissionCategory in storage",
     *      tags={"PermissionCategory"},
     *      description="Update PermissionCategory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of PermissionCategory",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="PermissionCategory that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/PermissionCategory")
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
     *                  ref="#/definitions/PermissionCategory"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatePermissionCategoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var PermissionCategory $permissionCategory */
        $permissionCategory = $this->permissionCategoryRepository->findWithoutFail($id);

        if (empty($permissionCategory)) {
            return $this->sendError('Permission Category not found');
        }

        $permissionCategory = $this->permissionCategoryRepository->update($input, $id);

        return $this->sendResponse($permissionCategory->toArray(), 'PermissionCategory updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/permissionCategories/{id}",
     *      summary="Remove the specified PermissionCategory from storage",
     *      tags={"PermissionCategory"},
     *      description="Delete PermissionCategory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of PermissionCategory",
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
        /** @var PermissionCategory $permissionCategory */
        $permissionCategory = $this->permissionCategoryRepository->findWithoutFail($id);

        if (empty($permissionCategory)) {
            return $this->sendError('Permission Category not found');
        }

        $permissionCategory->delete();

        return $this->sendResponse($id, 'Permission Category deleted successfully');
    }
}
