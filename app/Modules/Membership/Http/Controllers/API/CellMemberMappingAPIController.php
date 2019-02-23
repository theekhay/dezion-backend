<?php

namespace App\Modules\Membership\Http\Controllers\API;

use App\Modules\Membership\Http\Requests\API\CreateCellMemberMappingAPIRequest;
use App\Modules\Membership\Http\Requests\API\UpdateCellMemberMappingAPIRequest;
use App\Modules\Membership\Models\CellMemberMapping;
use App\Modules\Membership\Repositories\CellMemberMappingRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use function GuzzleHttp\json_encode;

/**
 * Class CellMemberMappingController
 * @package App\Modules\Membership\Http\Controllers\API
 * @group Member Mapping
 */

class CellMemberMappingAPIController extends AppBaseController
{
    /** @var  CellMemberMappingRepository */
    private $cellMemberMappingRepository;

    public function __construct(CellMemberMappingRepository $cellMemberMappingRepo)
    {
        $this->cellMemberMappingRepository = $cellMemberMappingRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/cellMemberMappings",
     *      summary="Get a listing of the CellMemberMappings.",
     *      tags={"CellMemberMapping"},
     *      description="Get all CellMemberMappings",
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
     *                  @SWG\Items(ref="#/definitions/CellMemberMapping")
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
        $this->cellMemberMappingRepository->pushCriteria(new RequestCriteria($request));
        $this->cellMemberMappingRepository->pushCriteria(new LimitOffsetCriteria($request));
        $cellMemberMappings = $this->cellMemberMappingRepository->all();

        return $this->sendResponse($cellMemberMappings->toArray(), 'Cell Member Mappings retrieved successfully');
    }

    /**
     * @param CreateCellMemberMappingAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/cellMemberMappings",
     *      summary="Store a newly created CellMemberMapping in storage",
     *      tags={"CellMemberMapping"},
     *      description="Store CellMemberMapping",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="CellMemberMapping that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/CellMemberMapping")
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
     *                  ref="#/definitions/CellMemberMapping"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     *
     * API to save members and the cells/fellowship/smallgroup they have been mapped to
     * The mapping is done based on proximity of location to the member's
     *
     * @bodyParam church_id integer required The church the member belongs to
     * @bodyParam mapped_model string required The model used for mapping e.g cell::class, smallGroup::class, houseFellowship::class
     * @bodyParam mapping_data array required The mapping data for the members being mapped Ex. [{"member_id":"1","model_id":"1", "status":"190"},{"member_id":"2","model_id":"2", "status":"190"}]
     *
     * @authenticated
     *
     */
    public function store(CreateCellMemberMappingAPIRequest $request)
    {
        //$input = $request->all();

        $cell_data =  $request->mapping_data ;

        $size = count($cell_data);

        $data = []; //to hold the final data to be saved

        for( $i = 0; $i < $size; $i++){

            //we have to handle users where user_id already exists in the db.

            $r = [
                'church_id' => $request->church_id,
                'mapped_model' => $request->mapped_model,
                'mapped_model_id' => $cell_data[$i]['model_id'],
                'status' => $cell_data[$i]['status'],
            ];

            CellMemberMapping::updateOrCreate( ['member_id' => $cell_data[$i]['member_id'] ], $r );
        }

        //$cellMemberMappings = CellMemberMapping::insert($data);

        return $this->sendResponse("", 'Cell Member Mapping saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/cellMemberMappings/{id}",
     *      summary="Display the specified CellMemberMapping",
     *      tags={"CellMemberMapping"},
     *      description="Get CellMemberMapping",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of CellMemberMapping",
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
     *                  ref="#/definitions/CellMemberMapping"
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
        /** @var CellMemberMapping $cellMemberMapping */
        $cellMemberMapping = $this->cellMemberMappingRepository->findWithoutFail($id);

        if (empty($cellMemberMapping)) {
            return $this->sendError('Cell Member Mapping not found');
        }

        return $this->sendResponse($cellMemberMapping->toArray(), 'Cell Member Mapping retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateCellMemberMappingAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/cellMemberMappings/{id}",
     *      summary="Update the specified CellMemberMapping in storage",
     *      tags={"CellMemberMapping"},
     *      description="Update CellMemberMapping",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of CellMemberMapping",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="CellMemberMapping that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/CellMemberMapping")
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
     *                  ref="#/definitions/CellMemberMapping"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateCellMemberMappingAPIRequest $request)
    {
        $input = $request->all();

        /** @var CellMemberMapping $cellMemberMapping */
        $cellMemberMapping = $this->cellMemberMappingRepository->findWithoutFail($id);

        if (empty($cellMemberMapping)) {
            return $this->sendError('Cell Member Mapping not found');
        }

        $cellMemberMapping = $this->cellMemberMappingRepository->update($input, $id);

        return $this->sendResponse($cellMemberMapping->toArray(), 'CellMemberMapping updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/cellMemberMappings/{id}",
     *      summary="Remove the specified CellMemberMapping from storage",
     *      tags={"CellMemberMapping"},
     *      description="Delete CellMemberMapping",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of CellMemberMapping",
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
        /** @var CellMemberMapping $cellMemberMapping */
        $cellMemberMapping = $this->cellMemberMappingRepository->findWithoutFail($id);

        if (empty($cellMemberMapping)) {
            return $this->sendError('Cell Member Mapping not found');
        }

        $cellMemberMapping->delete();

        return $this->sendResponse($id, 'Cell Member Mapping deleted successfully');
    }
}
