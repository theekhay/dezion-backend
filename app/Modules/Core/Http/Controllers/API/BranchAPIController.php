<?php

namespace App\Modules\Core\Http\Controllers\API;

use App\Modules\Core\Http\Requests\API\CreateBranchAPIRequest;
use App\Modules\Core\Http\Requests\API\UpdateBranchAPIRequest;
use Illuminate\Http\Request;

//models
use App\Modules\Core\Models\Branch;

//repo
use App\Modules\Core\Repositories\BranchRepository;

//controllers
use App\Http\Controllers\AppBaseController;

//resources
use App\Modules\Core\Http\Resources\BranchResource;

use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use Illuminate\Support\Facades\Auth;


/**
 * Class BranchController
 * @package App\Modules\Core\Http\Controllers\API
 */

class BranchAPIController extends AppBaseController
{
    /** @var  BranchRepository */
    private $branchRepository;

    public function __construct(BranchRepository $branchRepo)
    {
        $this->branchRepository = $branchRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/branches",
     *      summary="Get a listing of the Branches.",
     *      tags={"Branch"},
     *      description="Get all Branches",
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
     *                  @SWG\Items(ref="#/definitions/Branch")
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
        $this->branchRepository->pushCriteria(new RequestCriteria($request));
        $this->branchRepository->pushCriteria(new LimitOffsetCriteria($request));
        $branches = $this->branchRepository->all();

        // return $this->sendResponse($branches->toArray(), 'Branches retrieved successfully');

        return $this->sendResponse(  BranchResource::collection( $branches ), 'all branches' );
    }

    /**
     * @param CreateBranchAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/branches",
     *      summary="Store a newly created Branch in storage",
     *      tags={"Branch"},
     *      description="Store Branch",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Branch that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Branch")
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
     *                  ref="#/definitions/Branch"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateBranchAPIRequest $request)
    {
        $input = $request->all();
        $branches = $this->branchRepository->create($input);
        return $this->sendResponse( new BranchResource($branches), 'Branch saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/branches/{id}",
     *      summary="Display the specified Branch",
     *      tags={"Branch"},
     *      description="Get Branch",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Branch",
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
     *                  ref="#/definitions/Branch"
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
        $branch = $this->branchRepository->findWithoutFail($id);
        if (empty($branch))  return $this->sendError('Branch not found');
        return $this->sendResponse( new BranchResource( $branch ), 'Branch Detail retrieved successfully' );
    }


    /**
     * @param int $id
     * @param UpdateBranchAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/branches/{id}",
     *      summary="Update the specified Branch in storage",
     *      tags={"Branch"},
     *      description="Update Branch",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Branch",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Branch that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Branch")
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
     *                  ref="#/definitions/Branch"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateBranchAPIRequest $request)
    {
        $input = $request->all();

        $branch = $this->branchRepository->findWithoutFail($id);

        if (empty($branch)) return $this->sendError('Branch not found');

        $branch = $this->branchRepository->update($input, $id);

        return $this->sendResponse(new BranchResource( $branch ), 'Branch updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/branches/{id}",
     *      summary="Remove the specified Branch from storage",
     *      tags={"Branch"},
     *      description="Delete Branch",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Branch",
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
        /** @var Branch $branch */
        $branch = $this->branchRepository->findWithoutFail($id);

        if (empty($branch)) {
            return $this->sendError('Branch not found');
        }

        $branch->delete();

        return $this->sendResponse($id, 'Branch deleted successfully');
    }
}
