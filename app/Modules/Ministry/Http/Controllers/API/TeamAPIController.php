<?php

namespace App\Modules\Ministry\Http\Controllers\API;

use App\Modules\Ministry\Http\Requests\API\CreateTeamAPIRequest;
use App\Modules\Ministry\Http\Requests\API\UpdateTeamAPIRequest;
use App\Modules\Ministry\Models\Team;
use App\Modules\Ministry\Repositories\TeamRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TeamController
 * @package App\Modules\Ministry\Http\Controllers\API
 */

class TeamAPIController extends AppBaseController
{
    /** @var  TeamRepository */
    private $teamRepository;

    public function __construct(TeamRepository $teamRepo)
    {
        $this->teamRepository = $teamRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/teams",
     *      summary="Get a listing of the Teams.",
     *      tags={"Team"},
     *      description="Get all Teams",
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
     *                  @SWG\Items(ref="#/definitions/Team")
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
        $this->teamRepository->pushCriteria(new RequestCriteria($request));
        $this->teamRepository->pushCriteria(new LimitOffsetCriteria($request));
        $teams = $this->teamRepository->all();

        return $this->sendResponse($teams->toArray(), 'Teams retrieved successfully');
    }

    /**
     * @param CreateTeamAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/teams",
     *      summary="Store a newly created Team in storage",
     *      tags={"Team"},
     *      description="Store Team",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Team that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Team")
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
     *                  ref="#/definitions/Team"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateTeamAPIRequest $request)
    {
        $input = $request->all();

        $teams = $this->teamRepository->create($input);

        return $this->sendResponse($teams->toArray(), 'Team saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/teams/{id}",
     *      summary="Display the specified Team",
     *      tags={"Team"},
     *      description="Get Team",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Team",
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
     *                  ref="#/definitions/Team"
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
        /** @var Team $team */
        $team = $this->teamRepository->findWithoutFail($id);

        if (empty($team)) {
            return $this->sendError('Team not found');
        }

        return $this->sendResponse($team->toArray(), 'Team retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateTeamAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/teams/{id}",
     *      summary="Update the specified Team in storage",
     *      tags={"Team"},
     *      description="Update Team",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Team",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Team that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Team")
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
     *                  ref="#/definitions/Team"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateTeamAPIRequest $request)
    {
        $input = $request->all();

        /** @var Team $team */
        $team = $this->teamRepository->findWithoutFail($id);

        if (empty($team)) {
            return $this->sendError('Team not found');
        }

        $team = $this->teamRepository->update($input, $id);

        return $this->sendResponse($team->toArray(), 'Team updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/teams/{id}",
     *      summary="Remove the specified Team from storage",
     *      tags={"Team"},
     *      description="Delete Team",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Team",
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
        /** @var Team $team */
        $team = $this->teamRepository->findWithoutFail($id);

        if (empty($team)) {
            return $this->sendError('Team not found');
        }

        $team->delete();

        return $this->sendResponse($id, 'Team deleted successfully');
    }
}
