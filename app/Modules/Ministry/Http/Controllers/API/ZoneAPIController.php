<?php

namespace App\Modules\ministry\Http\Controllers\API;

use App\Modules\ministry\Http\Requests\API\CreateZoneAPIRequest;
use App\Modules\ministry\Http\Requests\API\UpdateZoneAPIRequest;
use App\Modules\ministry\Models\Zone;
use App\Modules\ministry\Repositories\ZoneRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ZoneController
 * @package App\Modules\ministry\Http\Controllers\API
 */

class ZoneAPIController extends AppBaseController
{
    /** @var  ZoneRepository */
    private $zoneRepository;

    public function __construct(ZoneRepository $zoneRepo)
    {
        $this->zoneRepository = $zoneRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/zones",
     *      summary="Get a listing of the Zones.",
     *      tags={"Zone"},
     *      description="Get all Zones",
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
     *                  @SWG\Items(ref="#/definitions/Zone")
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
        $this->zoneRepository->pushCriteria(new RequestCriteria($request));
        $this->zoneRepository->pushCriteria(new LimitOffsetCriteria($request));
        $zones = $this->zoneRepository->all();

        return $this->sendResponse($zones->toArray(), 'Zones retrieved successfully');
    }

    /**
     * @param CreateZoneAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/zones",
     *      summary="Store a newly created Zone in storage",
     *      tags={"Zone"},
     *      description="Store Zone",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Zone that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Zone")
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
     *                  ref="#/definitions/Zone"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateZoneAPIRequest $request)
    {
        $input = $request->all();

        $zones = $this->zoneRepository->create($input);

        return $this->sendResponse($zones->toArray(), 'Zone saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/zones/{id}",
     *      summary="Display the specified Zone",
     *      tags={"Zone"},
     *      description="Get Zone",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Zone",
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
     *                  ref="#/definitions/Zone"
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
        /** @var Zone $zone */
        $zone = $this->zoneRepository->findWithoutFail($id);

        if (empty($zone)) {
            return $this->sendError('Zone not found');
        }

        return $this->sendResponse($zone->toArray(), 'Zone retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateZoneAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/zones/{id}",
     *      summary="Update the specified Zone in storage",
     *      tags={"Zone"},
     *      description="Update Zone",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Zone",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Zone that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Zone")
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
     *                  ref="#/definitions/Zone"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateZoneAPIRequest $request)
    {
        $input = $request->all();

        /** @var Zone $zone */
        $zone = $this->zoneRepository->findWithoutFail($id);

        if (empty($zone)) {
            return $this->sendError('Zone not found');
        }

        $zone = $this->zoneRepository->update($input, $id);

        return $this->sendResponse($zone->toArray(), 'Zone updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/zones/{id}",
     *      summary="Remove the specified Zone from storage",
     *      tags={"Zone"},
     *      description="Delete Zone",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Zone",
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
        /** @var Zone $zone */
        $zone = $this->zoneRepository->findWithoutFail($id);

        if (empty($zone)) {
            return $this->sendError('Zone not found');
        }

        $zone->delete();

        return $this->sendResponse($id, 'Zone deleted successfully');
    }
}
