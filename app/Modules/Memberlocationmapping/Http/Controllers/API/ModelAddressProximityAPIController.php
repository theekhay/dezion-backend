<?php

namespace App\Modules\memberlocationmapping\Http\Controllers\API;

use App\Modules\memberlocationmapping\Http\Requests\API\CreateModelAddressProximityAPIRequest;
use App\Modules\memberlocationmapping\Http\Requests\API\UpdateModelAddressProximityAPIRequest;
use App\Modules\memberlocationmapping\Models\ModelAddressProximity;
use App\Modules\memberlocationmapping\Repositories\ModelAddressProximityRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Modules\memberlocationmapping\Models\MappingModelStatus;
use function GuzzleHttp\json_encode;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Auth;

/**
 * Class ModelAddressProximityController
 * @package App\Modules\memberlocationmapping\Http\Controllers\API
 * @group mapping
 */

class ModelAddressProximityAPIController extends AppBaseController
{
    /** @var  ModelAddressProximityRepository */
    private $modelAddressProximityRepository;

    public function __construct(ModelAddressProximityRepository $modelAddressProximityRepo)
    {
        $this->modelAddressProximityRepository = $modelAddressProximityRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/modelAddressProximities",
     *      summary="Get a listing of the ModelAddressProximities.",
     *      tags={"ModelAddressProximity"},
     *      description="Get all ModelAddressProximities",
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
     *                  @SWG\Items(ref="#/definitions/ModelAddressProximity")
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
        $this->modelAddressProximityRepository->pushCriteria(new RequestCriteria($request));
        $this->modelAddressProximityRepository->pushCriteria(new LimitOffsetCriteria($request));
        $modelAddressProximities = $this->modelAddressProximityRepository->all();

        return $this->sendResponse($modelAddressProximities->toArray(), 'Model Address Proximities retrieved successfully');
    }

    /**
     * API for saving the distance of a mapping model from central.
     * This saves the distance of the model address to be mapped from central.
     *
     * @param CreateModelAddressProximityAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/modelAddressProximities",
     *      summary="Store a newly created ModelAddressProximity in storage",
     *      tags={"ModelAddressProximity"},
     *      description="Store ModelAddressProximity",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ModelAddressProximity that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ModelAddressProximity")
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
     *                  ref="#/definitions/ModelAddressProximity"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="stringm"
     *              )
     *          )
     *      )
     * )
     *
     * @authenticated
     * @bodyParam church_id integer required The id of the church the mapping is being ran on
     * @bodyParam mapping_data array required The data returend from the mapping process ex. {"id":"11","address":{"distance":{"text":"8.8 mi","value":14176},"duration":{"text":"22 mins","value":1296},"status":"OK"}} || {"id":"1","address":{"status":"ZERO_RESULTS"}}
     *
     * ToDO: This function should be carried out by the superadmin only.
     */
    public function store(CreateModelAddressProximityAPIRequest $request)
    {
        $mapping_data = $request->mapping_data;

        $save_data = []; // this would hold the data to be stored in the db.

        $size = count($mapping_data);

        for($i = 0; $i < $size; $i++)
        {
            $current = [
                'status'    => ( $mapping_data[$i]['address']['status'] == 'OK') ? MappingModelStatus::VALID : MappingModelStatus::INVALID,
                'church_id' => $request->church_id,
                'distance'  => ( $mapping_data[$i]['address']['status'] == 'OK') ? $mapping_data[$i]['address']['distance']['value'] : 0.00, //this is in meter
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'uuid' => Uuid::uuid4()->toString(),
                'created_by' => Auth::id(),

            ];

            $save_data[] = $current;
        }

        if (! ModelAddressProximity::insert($save_data) ){
            return $this->sendError("Error: unable to process this request at this time.");
        }

        return $this->sendResponse($save_data, 'Model Address Proximity saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/modelAddressProximities/{id}",
     *      summary="Display the specified ModelAddressProximity",
     *      tags={"ModelAddressProximity"},
     *      description="Get ModelAddressProximity",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ModelAddressProximity",
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
     *                  ref="#/definitions/ModelAddressProximity"
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
        /** @var ModelAddressProximity $modelAddressProximity */
        $modelAddressProximity = $this->modelAddressProximityRepository->findWithoutFail($id);

        if (empty($modelAddressProximity)) {
            return $this->sendError('Model Address Proximity not found');
        }

        return $this->sendResponse($modelAddressProximity->toArray(), 'Model Address Proximity retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateModelAddressProximityAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/modelAddressProximities/{id}",
     *      summary="Update the specified ModelAddressProximity in storage",
     *      tags={"ModelAddressProximity"},
     *      description="Update ModelAddressProximity",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ModelAddressProximity",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ModelAddressProximity that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ModelAddressProximity")
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
     *                  ref="#/definitions/ModelAddressProximity"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateModelAddressProximityAPIRequest $request)
    {
        $input = $request->all();

        /** @var ModelAddressProximity $modelAddressProximity */
        $modelAddressProximity = $this->modelAddressProximityRepository->findWithoutFail($id);

        if (empty($modelAddressProximity)) {
            return $this->sendError('Model Address Proximity not found');
        }

        $modelAddressProximity = $this->modelAddressProximityRepository->update($input, $id);

        return $this->sendResponse($modelAddressProximity->toArray(), 'ModelAddressProximity updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/modelAddressProximities/{id}",
     *      summary="Remove the specified ModelAddressProximity from storage",
     *      tags={"ModelAddressProximity"},
     *      description="Delete ModelAddressProximity",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ModelAddressProximity",
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
        /** @var ModelAddressProximity $modelAddressProximity */
        $modelAddressProximity = $this->modelAddressProximityRepository->findWithoutFail($id);

        if (empty($modelAddressProximity)) {
            return $this->sendError('Model Address Proximity not found');
        }

        $modelAddressProximity->delete();

        return $this->sendResponse($id, 'Model Address Proximity deleted successfully');
    }
}
