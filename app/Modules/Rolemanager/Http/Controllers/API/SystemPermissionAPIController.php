<?php

namespace App\Modules\rolemanager\Http\Controllers\API;

use App\Modules\rolemanager\Http\Requests\API\CreateSystemPermissionAPIRequest;
use App\Modules\rolemanager\Http\Requests\API\UpdateSystemPermissionAPIRequest;
use App\Modules\rolemanager\Models\SystemPermission;
use App\Modules\rolemanager\Repositories\SystemPermissionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Modules\Rolemanager\Http\Resources\SystemPermissionResource;
use App\Modules\Rolemanager\Http\Resources\PermissionResource;

/**
 * Class SystemPermissionController
 * @package App\Modules\rolemanager\Http\Controllers\API
 * @group Role and Permission Management
 */

class SystemPermissionAPIController extends AppBaseController
{
    /** @var  SystemPermissionRepository */
    private $systemPermissionRepository;

    public function __construct(SystemPermissionRepository $systemPermissionRepo)
    {
        $this->systemPermissionRepository = $systemPermissionRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/systemPermissions",
     *      summary="Get a listing of the SystemPermissions.",
     *      tags={"SystemPermission"},
     *      description="Get all SystemPermissions",
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
     *                  @SWG\Items(ref="#/definitions/SystemPermission")
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
        $this->systemPermissionRepository->pushCriteria(new RequestCriteria($request));
        $this->systemPermissionRepository->pushCriteria(new LimitOffsetCriteria($request));
        $systemPermissions = $this->systemPermissionRepository->all()->groupBy('category_id');

        return $this->sendResponse( new PermissionResource($systemPermissions), 'System Permissions retrieved successfully');
    }

    /**
     * @param CreateSystemPermissionAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/systemPermissions",
     *      summary="Store a newly created SystemPermission in storage",
     *      tags={"SystemPermission"},
     *      description="Store SystemPermission",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="SystemPermission that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/SystemPermission")
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
     *                  ref="#/definitions/SystemPermission"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateSystemPermissionAPIRequest $request)
    {
        $input = $request->all();

        try{

            $systemPermissions = $this->systemPermissionRepository->create($input);
            return $this->sendResponse( new PermissionResource( $systemPermissions ), 'Permission created successfully');
        }
        catch( PermissionAlreadyExists $e){

            return $this->sendError($e->getMessage() );
        }
        catch( \Exception $e){

            return $this->sendError("Error processing request");
        }
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/systemPermissions/{id}",
     *      summary="Display the specified SystemPermission",
     *      tags={"SystemPermission"},
     *      description="Get SystemPermission",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SystemPermission",
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
     *                  ref="#/definitions/SystemPermission"
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
        /** @var SystemPermission $systemPermission */
        $systemPermission = $this->systemPermissionRepository->findWithoutFail($id);

        if (empty($systemPermission) ) {
            return $this->sendError('System Permission not found');
        }

        return $this->sendResponse($systemPermission->toArray(), 'System Permission retrieved successfully');
    }



    /**
     * @param int $id
     * @param UpdateSystemPermissionAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/systemPermissions/{id}",
     *      summary="Update the specified SystemPermission in storage",
     *      tags={"SystemPermission"},
     *      description="Update SystemPermission",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SystemPermission",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="SystemPermission that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/SystemPermission")
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
     *                  ref="#/definitions/SystemPermission"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateSystemPermissionAPIRequest $request)
    {
        $input = $request->all();

        /** @var SystemPermission $systemPermission */
        $systemPermission = $this->systemPermissionRepository->findWithoutFail($id);

        if (empty($systemPermission)) {
            return $this->sendError('System Permission not found');
        }

        $systemPermission = $this->systemPermissionRepository->update($input, $id);

        return $this->sendResponse($systemPermission->toArray(), 'SystemPermission updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/systemPermissions/{id}",
     *      summary="Remove the specified SystemPermission from storage",
     *      tags={"SystemPermission"},
     *      description="Delete SystemPermission",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SystemPermission",
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
        /** @var SystemPermission $systemPermission */
        $systemPermission = $this->systemPermissionRepository->findWithoutFail($id);

        if (empty($systemPermission)) {
            return $this->sendError('System Permission not found');
        }

        $systemPermission->delete();

        return $this->sendResponse($id, 'System Permission deleted successfully');
    }
}
