<?php

namespace App\Modules\RoleManager\Http\Controllers\API;

use App\Modules\RoleManager\Http\Requests\API\CreateRoleAPIRequest;
use App\Modules\RoleManager\Http\Requests\API\UpdateRoleAPIRequest;
use App\Modules\RoleManager\Models\Role;
use App\Modules\RoleManager\Repositories\RoleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use Spatie\Permission\Models\Role as RoleProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\ModelStatus;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

use App\Modules\Rolemanager\Http\Requests\API\CreatePermissionAPIRequest;
use Spatie\Permission\Exceptions\PermissionAlreadyExists;

use App\Modules\Rolemanager\Http\Resources\PermissionResource;
use Spatie\Permission\Exceptions\RoleAlreadyExists;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;


/**
 * Class RoleController
 * @package App\Modules\RoleManager\Http\Controllers\API
 */

class RoleAPIController extends AppBaseController
{
    /** @var  RoleRepository */
    private $roleRepository;



    public function __construct(RoleRepository $roleRepo)
    {
        $this->roleRepository = $roleRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/roles",
     *      summary="Get a listing of the Roles.",
     *      tags={"Role"},
     *      description="Get all Roles",
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
     *                  @SWG\Items(ref="#/definitions/Role")
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
        $this->roleRepository->pushCriteria(new RequestCriteria($request));
        $this->roleRepository->pushCriteria(new LimitOffsetCriteria($request));
        $roles = $this->roleRepository->all();

        return $this->sendResponse($roles->toArray(), 'Roles retrieved successfully');
    }

    /**
     * @param CreateRoleAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/roles",
     *      summary="Store a newly created Role in storage",
     *      tags={"Role"},
     *      description="Store Role",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Role that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Role")
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
     *                  ref="#/definitions/Role"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateRoleAPIRequest $request)
    {
        $input = $request->except('permissions');

        try{
            DB::beginTransaction();

            $role = $this->roleRepository->create($input);

            if( ! empty( $request->permissions) ){
                $role->syncPermissions($request->permissions);
            }

            DB::commit();

            return $this->sendResponse($role->toArray(), 'Role saved successfully');
        }
        catch( RoleAlreadyExists $e ){
            return $this->sendError($e->getMessage(), 400);
        }
        catch( PermissionDoesNotExist $e ){
            return $this->sendError($e->getMessage(), 400);
        }
        catch( \Exception $e){


            return $this->sendError("error processing request", 400);
        }
        finally{
           // DB::rollBack();
        }

    }



    /**
     * API for making a new permission.
     */
    public function makePermission( CreatePermissionAPIRequest $request)
    {
        $input = $request->all();
        $info = ['created_by' => Auth::id(), 'status' => ModelStatus::ACTIVE, 'uuid' => Str::uuid() ];

        try{

            $permission = Permission::create( $input + $info);
            return $this->sendResponse( new PermissionResource($permission), 'Permission created successfully');
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
     *      path="/roles/{id}",
     *      summary="Display the specified Role",
     *      tags={"Role"},
     *      description="Get Role",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Role",
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
     *                  ref="#/definitions/Role"
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
        /** @var Role $role */
        $role = $this->roleRepository->findWithoutFail($id);

        if (empty($role)) {
            return $this->sendError('Role not found');
        }

        return $this->sendResponse($role->toArray(), 'Role retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateRoleAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/roles/{id}",
     *      summary="Update the specified Role in storage",
     *      tags={"Role"},
     *      description="Update Role",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Role",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Role that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Role")
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
     *                  ref="#/definitions/Role"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateRoleAPIRequest $request)
    {
        $input = $request->all();

        /** @var Role $role */
        $role = $this->roleRepository->findWithoutFail($id);

        if (empty($role)) {
            return $this->sendError('Role not found');
        }

        $role = $this->roleRepository->update($input, $id);

        return $this->sendResponse($role->toArray(), 'Role updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/roles/{id}",
     *      summary="Remove the specified Role from storage",
     *      tags={"Role"},
     *      description="Delete Role",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Role",
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
        /** @var Role $role */
        $role = $this->roleRepository->findWithoutFail($id);

        if (empty($role)) {
            return $this->sendError('Role not found');
        }

        $role->delete();

        return $this->sendResponse($id, 'Role deleted successfully');
    }


    public function toRole( Permission $permission){

    }
}