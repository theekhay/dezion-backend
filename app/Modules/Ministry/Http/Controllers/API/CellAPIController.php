<?php

namespace App\Modules\ministry\Http\Controllers\API;

use App\Modules\ministry\Http\Requests\API\CreateCellAPIRequest;
use App\Modules\ministry\Http\Requests\API\UpdateCellAPIRequest;
use App\Modules\ministry\Models\Cell;
use App\Modules\ministry\Repositories\CellRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Modules\Ministry\Http\Resources\CellResource;

/**
 * Class CellController
 * @package App\Modules\ministry\Http\Controllers\API
 */

class CellAPIController extends AppBaseController
{
    /** @var  CellRepository */
    private $cellRepository;

    public function __construct(CellRepository $cellRepo)
    {
        $this->cellRepository = $cellRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/cells",
     *      summary="Get a listing of the Cells.",
     *      tags={"Cell"},
     *      description="Get all Cells",
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
     *                  @SWG\Items(ref="#/definitions/Cell")
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
        $this->cellRepository->pushCriteria(new RequestCriteria($request));
        $this->cellRepository->pushCriteria(new LimitOffsetCriteria($request));
        $cells = $this->cellRepository->paginate();

        return $this->sendResponse( new CellResource($cells), 'Cells retrieved successfully');
    }

    /**
     * @param CreateCellAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/cells",
     *      summary="Store a newly created Cell in storage",
     *      tags={"Cell"},
     *      description="Store Cell",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Cell that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Cell")
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
     *                  ref="#/definitions/Cell"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateCellAPIRequest $request)
    {
        $input = $request->all();
        $cells = $this->cellRepository->create($input);
        return $this->sendResponse( new CellResource($cells), 'Cell saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/cells/{id}",
     *      summary="Display the specified Cell",
     *      tags={"Cell"},
     *      description="Get Cell",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Cell",
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
     *                  ref="#/definitions/Cell"
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
        /** @var Cell $cell */
        $cell = $this->cellRepository->findWithoutFail($id);

        if (empty($cell)) {
            return $this->sendError('Cell not found');
        }

        return $this->sendResponse( new CellResource($cell), 'Cell retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateCellAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/cells/{id}",
     *      summary="Update the specified Cell in storage",
     *      tags={"Cell"},
     *      description="Update Cell",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Cell",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Cell that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Cell")
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
     *                  ref="#/definitions/Cell"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateCellAPIRequest $request)
    {
        $input = $request->all();

        /** @var Cell $cell */
        $cell = $this->cellRepository->findWithoutFail($id);

        if (empty($cell)) {
            return $this->sendError('Cell not found');
        }

        $cell = $this->cellRepository->update($input, $id);

        return $this->sendResponse($cell->toArray(), 'Cell updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/cells/{id}",
     *      summary="Remove the specified Cell from storage",
     *      tags={"Cell"},
     *      description="Delete Cell",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Cell",
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
        /** @var Cell $cell */
        $cell = $this->cellRepository->findWithoutFail($id);

        if (empty($cell)) {
            return $this->sendError('Cell not found');
        }

        $cell->delete();

        return $this->sendResponse($id, 'Cell deleted successfully');
    }
}
