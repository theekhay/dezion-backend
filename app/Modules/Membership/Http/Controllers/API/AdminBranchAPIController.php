<?php

namespace App\Modules\Membership\Http\Controllers\API;

//requests
use App\Modules\Membership\Http\Requests\API\CreateAdminBranchAPIRequest;
use App\Modules\Membership\Http\Requests\API\UpdateAdminBranchAPIRequest;
use Illuminate\Http\Request;

//models
use App\Modules\Membership\Models\AdminBranch;
use App\Modules\Core\Models\Branch;

//repo
use App\Modules\Membership\Repositories\AdminBranchRepository;

//controllers
use App\Http\Controllers\AppBaseController;

//criteria
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;

//resourcws
use App\Modules\Core\Http\Resources\BranchResource;
use App\Modules\Membership\Http\Resources\AdminBranchResource;

//others
use Illuminate\Support\Facades\Auth;
use Response;

/**
 * Class AdminBranchController
 * @package App\Modules\Membership\Http\Controllers\API
 */

class AdminBranchAPIController extends AppBaseController
{
    /** @var  AdminBranchRepository */
    private $adminBranchRepository;

    public function __construct(AdminBranchRepository $adminBranchRepo)
    {
        $this->adminBranchRepository = $adminBranchRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/adminBranches",
     *      summary="Get a listing of the AdminBranches.",
     *      tags={"AdminBranch"},
     *      description="Get all AdminBranches",
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
     *                  @SWG\Items(ref="#/definitions/AdminBranch")
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
        // $this->adminBranchRepository->pushCriteria(new RequestCriteria($request));
        // $this->adminBranchRepository->pushCriteria(new LimitOffsetCriteria($request));
        // $adminBranches = $this->adminBranchRepository->all();

        $admin = Auth::user();
        $branches = $admin->branches()->get();
        return $this->sendResponse( BranchResource::collection($branches), 'branches retreived succesfully' );



        // if( $admin->isChurchAdmin() ){
        //     $branches = $admin->toChurchAdmin()->branches()->get();
        //     return $this->sendResponse( BranchResource::collection($branches), 'branches retreived succesfully' );
        // }
        // else{

        //     $branches = $admin->branches()->paginate(50);
        //     return $this->sendResponse( AdminBranchResource::collection($branches), 'branches retreived succesfully' );
        // }
    }

    /**
     * @param CreateAdminBranchAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/adminBranches",
     *      summary="Store a newly created AdminBranch in storage",
     *      tags={"AdminBranch"},
     *      description="Store AdminBranch",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="AdminBranch that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/AdminBranch")
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
     *                  ref="#/definitions/AdminBranch"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateAdminBranchAPIRequest $request)
    {
        $input = $request->all();

        $adminBranches = $this->adminBranchRepository->create($input);

        return $this->sendResponse($adminBranches->toArray(), 'Admin Branch saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/adminBranches/{id}",
     *      summary="Display the specified AdminBranch",
     *      tags={"AdminBranch"},
     *      description="Get AdminBranch",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of AdminBranch",
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
     *                  ref="#/definitions/AdminBranch"
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
        /** @var AdminBranch $adminBranch */
        $adminBranch = $this->adminBranchRepository->findWithoutFail($id);

        if (empty($adminBranch)) {
            return $this->sendError('Admin Branch not found');
        }

        return $this->sendResponse($adminBranch->toArray(), 'Admin Branch retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateAdminBranchAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/adminBranches/{id}",
     *      summary="Update the specified AdminBranch in storage",
     *      tags={"AdminBranch"},
     *      description="Update AdminBranch",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of AdminBranch",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="AdminBranch that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/AdminBranch")
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
     *                  ref="#/definitions/AdminBranch"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateAdminBranchAPIRequest $request)
    {
        $input = $request->all();

        /** @var AdminBranch $adminBranch */
        $adminBranch = $this->adminBranchRepository->findWithoutFail($id);

        if (empty($adminBranch)) {
            return $this->sendError('Admin Branch not found');
        }

        $adminBranch = $this->adminBranchRepository->update($input, $id);

        return $this->sendResponse($adminBranch->toArray(), 'AdminBranch updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/adminBranches/{id}",
     *      summary="Remove the specified AdminBranch from storage",
     *      tags={"AdminBranch"},
     *      description="Delete AdminBranch",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of AdminBranch",
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
        /** @var AdminBranch $adminBranch */
        $adminBranch = $this->adminBranchRepository->findWithoutFail($id);

        if (empty($adminBranch)) {
            return $this->sendError('Admin Branch not found');
        }

        $adminBranch->delete();

        return $this->sendResponse($id, 'Admin Branch deleted successfully');
    }
}
