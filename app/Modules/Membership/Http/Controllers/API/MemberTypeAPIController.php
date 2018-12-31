<?php

namespace App\Modules\Membership\Http\Controllers\API;

//requests
use App\Modules\Membership\Http\Requests\API\CreateMemberTypeAPIRequest;
use App\Modules\Membership\Http\Requests\API\UpdateMemberTypeAPIRequest;
use Illuminate\Http\Request;

//models
use App\Modules\Membership\Models\MemberType;

//repo
use App\Modules\Membership\Repositories\MemberTypeRepository;

//controllers
use App\Http\Controllers\AppBaseController;

//resources
use App\Modules\Membership\Http\Resources\MemberTypeResource;

//auth
use Illuminate\Support\Facades\Auth;

use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class MemberTypeController
 * @package App\Modules\Membership\Http\Controllers\API
 */

class MemberTypeAPIController extends AppBaseController
{
    /** @var  MemberTypeRepository */
    private $memberTypeRepository;

    public function __construct(MemberTypeRepository $memberTypeRepo)
    {
        $this->memberTypeRepository = $memberTypeRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/memberTypes",
     *      summary="Get a listing of the MemberTypes.",
     *      tags={"MemberType"},
     *      description="Get all MemberTypes",
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
     *                  @SWG\Items(ref="#/definitions/MemberType")
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
        $this->memberTypeRepository->pushCriteria(new RequestCriteria($request));
        $this->memberTypeRepository->pushCriteria(new LimitOffsetCriteria($request));
        $memberTypes = $this->memberTypeRepository->all();

        return $this->sendResponse( MemberTypeResource::collection($memberTypes), 'Member Types retrieved successfully');
    }

    /**
     * @param CreateMemberTypeAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/memberTypes",
     *      summary="Store a newly created MemberType in storage",
     *      tags={"MemberType"},
     *      description="Store MemberType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="MemberType that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/MemberType")
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
     *                  ref="#/definitions/MemberType"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateMemberTypeAPIRequest $request)
    {
        $input = $request->all();
        $memberTypes = $this->memberTypeRepository->create($input);
        return $this->sendResponse( new MemberTypeResource($memberTypes), 'Member Type saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/memberTypes/{id}",
     *      summary="Display the specified MemberType",
     *      tags={"MemberType"},
     *      description="Get MemberType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MemberType",
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
     *                  ref="#/definitions/MemberType"
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
        $memberType = $this->memberTypeRepository->findWithoutFail($id);

        if (empty($memberType)) {
            return $this->sendError('Member Type not found');
        }

        return $this->sendResponse( new MemberTypeResource($memberType), 'Member Type retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateMemberTypeAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/memberTypes/{id}",
     *      summary="Update the specified MemberType in storage",
     *      tags={"MemberType"},
     *      description="Update MemberType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MemberType",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="MemberType that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/MemberType")
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
     *                  ref="#/definitions/MemberType"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateMemberTypeAPIRequest $request)
    {
        $input = $request->all();

        /** @var MemberType $memberType */
        $memberType = $this->memberTypeRepository->findWithoutFail($id);

        if (empty($memberType)) {
            return $this->sendError('Member Type not found');
        }

        $memberType = $this->memberTypeRepository->update($input, $id);

        return $this->sendResponse($memberType->toArray(), 'MemberType updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/memberTypes/{id}",
     *      summary="Remove the specified MemberType from storage",
     *      tags={"MemberType"},
     *      description="Delete MemberType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MemberType",
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
        /** @var MemberType $memberType */
        $memberType = $this->memberTypeRepository->findWithoutFail($id);

        if (empty($memberType)) {
            return $this->sendError('Member Type not found');
        }

        $memberType->delete();

        return $this->sendResponse($id, 'Member Type deleted successfully');
    }



}
