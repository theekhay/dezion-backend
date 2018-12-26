<?php

namespace App\Modules\Membership\Http\Controllers\API;

//requests
use App\Modules\Membership\Http\Requests\API\CreateMemberDetailAPIRequest;
use App\Modules\Membership\Http\Requests\API\UpdateMemberDetailAPIRequest;
use Illuminate\Http\Request;

//models
use App\Modules\Membership\Models\MemberDetail;

//repos
use App\Modules\Membership\Repositories\MemberDetailRepository;

//controllers
use App\Http\Controllers\AppBaseController;

//resources
use App\Modules\Membership\Http\Resources\MemberDetailResource;

use Response;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;

use Illuminate\Support\Facades\Auth;

/**
 * Class MemberDetailController
 * @package App\Modules\Membership\Http\Controllers\API
 */

class MemberDetailAPIController extends AppBaseController
{
    /** @var  MemberDetailRepository */
    private $memberDetailRepository;

    public function __construct(MemberDetailRepository $memberDetailRepo)
    {
        $this->memberDetailRepository = $memberDetailRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/memberDetails",
     *      summary="Get a listing of the MemberDetails.",
     *      tags={"MemberDetail"},
     *      description="Get all MemberDetails",
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
     *                  @SWG\Items(ref="#/definitions/MemberDetail")
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
        $this->memberDetailRepository->pushCriteria(new RequestCriteria($request));
        $this->memberDetailRepository->pushCriteria(new LimitOffsetCriteria($request));
        $memberDetails = $this->memberDetailRepository->paginate(50);

        return $this->sendResponse( new MemberDetailResource($memberDetails), 'Member Details retrieved successfully');
    }

    /**
     * @param CreateMemberDetailAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/memberDetails",
     *      summary="Store a newly created MemberDetail in storage",
     *      tags={"MemberDetail"},
     *      description="Store MemberDetail",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="MemberDetail that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/MemberDetail")
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
     *                  ref="#/definitions/MemberDetail"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateMemberDetailAPIRequest $request)
    {
        $input = $request->all();
        $memberDetails = $this->memberDetailRepository->create($input + ['created_by' => Auth::id()] );
        return $this->sendResponse(new MemberDetailResource($memberDetails), 'Member Detail saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/memberDetails/{id}",
     *      summary="Display the specified MemberDetail",
     *      tags={"MemberDetail"},
     *      description="Get MemberDetail",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MemberDetail",
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
     *                  ref="#/definitions/MemberDetail"
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
        $memberDetail = $this->memberDetailRepository->findWithoutFail($id);

        if (empty($memberDetail)) {
            return $this->sendError('Member Detail not found');
        }

        return $this->sendResponse( new MemberDetailResource($memberDetail), 'Member Detail retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateMemberDetailAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/memberDetails/{id}",
     *      summary="Update the specified MemberDetail in storage",
     *      tags={"MemberDetail"},
     *      description="Update MemberDetail",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MemberDetail",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="MemberDetail that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/MemberDetail")
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
     *                  ref="#/definitions/MemberDetail"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateMemberDetailAPIRequest $request)
    {
        $input = $request->all();

        /** @var MemberDetail $memberDetail */
        $memberDetail = $this->memberDetailRepository->findWithoutFail($id);

        if (empty($memberDetail)) {
            return $this->sendError('Member Detail not found');
        }

        $memberDetail = $this->memberDetailRepository->update($input, $id);

        return $this->sendResponse($memberDetail->toArray(), 'MemberDetail updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/memberDetails/{id}",
     *      summary="Remove the specified MemberDetail from storage",
     *      tags={"MemberDetail"},
     *      description="Delete MemberDetail",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MemberDetail",
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
        /** @var MemberDetail $memberDetail */
        $memberDetail = $this->memberDetailRepository->findWithoutFail($id);

        if (empty($memberDetail)) {
            return $this->sendError('Member Detail not found');
        }

        $memberDetail->delete();

        return $this->sendResponse($id, 'Member Detail deleted successfully');
    }
}
