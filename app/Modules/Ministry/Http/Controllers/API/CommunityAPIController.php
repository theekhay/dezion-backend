<?php

namespace App\Modules\ministry\Http\Controllers\API;

use App\Modules\ministry\Http\Requests\API\CreateCommunityAPIRequest;
use App\Modules\ministry\Http\Requests\API\UpdateCommunityAPIRequest;
use App\Modules\ministry\Models\Community;
use App\Modules\ministry\Repositories\CommunityRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class CommunityController
 * @package App\Modules\ministry\Http\Controllers\API
 */

class CommunityAPIController extends AppBaseController
{
    /** @var  CommunityRepository */
    private $communityRepository;

    public function __construct(CommunityRepository $communityRepo)
    {
        $this->communityRepository = $communityRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/communities",
     *      summary="Get a listing of the Communities.",
     *      tags={"Community"},
     *      description="Get all Communities",
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
     *                  @SWG\Items(ref="#/definitions/Community")
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
        $this->communityRepository->pushCriteria(new RequestCriteria($request));
        $this->communityRepository->pushCriteria(new LimitOffsetCriteria($request));
        $communities = $this->communityRepository->all();

        return $this->sendResponse($communities->toArray(), 'Communities retrieved successfully');
    }

    /**
     * @param CreateCommunityAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/communities",
     *      summary="Store a newly created Community in storage",
     *      tags={"Community"},
     *      description="Store Community",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Community that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Community")
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
     *                  ref="#/definitions/Community"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateCommunityAPIRequest $request)
    {
        $input = $request->all();

        $communities = $this->communityRepository->create($input);

        return $this->sendResponse($communities->toArray(), 'Community saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/communities/{id}",
     *      summary="Display the specified Community",
     *      tags={"Community"},
     *      description="Get Community",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Community",
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
     *                  ref="#/definitions/Community"
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
        /** @var Community $community */
        $community = $this->communityRepository->findWithoutFail($id);

        if (empty($community)) {
            return $this->sendError('Community not found');
        }

        return $this->sendResponse($community->toArray(), 'Community retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateCommunityAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/communities/{id}",
     *      summary="Update the specified Community in storage",
     *      tags={"Community"},
     *      description="Update Community",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Community",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Community that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Community")
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
     *                  ref="#/definitions/Community"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateCommunityAPIRequest $request)
    {
        $input = $request->all();

        /** @var Community $community */
        $community = $this->communityRepository->findWithoutFail($id);

        if (empty($community)) {
            return $this->sendError('Community not found');
        }

        $community = $this->communityRepository->update($input, $id);

        return $this->sendResponse($community->toArray(), 'Community updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/communities/{id}",
     *      summary="Remove the specified Community from storage",
     *      tags={"Community"},
     *      description="Delete Community",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Community",
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
        /** @var Community $community */
        $community = $this->communityRepository->findWithoutFail($id);

        if (empty($community)) {
            return $this->sendError('Community not found');
        }

        $community->delete();

        return $this->sendResponse($id, 'Community deleted successfully');
    }
}
