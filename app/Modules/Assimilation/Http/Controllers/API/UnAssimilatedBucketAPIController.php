<?php

namespace App\Modules\Assimilation\Http\Controllers\API;

use App\Modules\Assimilation\Http\Requests\API\CreateUnAssimilatedBucketAPIRequest;
use App\Modules\Assimilation\Http\Requests\API\UpdateUnAssimilatedBucketAPIRequest;
use App\Modules\Assimilation\Models\UnAssimilatedBucket;
use App\Modules\Assimilation\Repositories\UnAssimilatedBucketRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class UnAssimilatedBucketController
 * @package App\Modules\Assimilation\Http\Controllers\API
 */

class UnAssimilatedBucketAPIController extends AppBaseController
{
    /** @var  UnAssimilatedBucketRepository */
    private $unAssimilatedBucketRepository;

    public function __construct(UnAssimilatedBucketRepository $unAssimilatedBucketRepo)
    {
        $this->unAssimilatedBucketRepository = $unAssimilatedBucketRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/unAssimilatedBuckets",
     *      summary="Get a listing of the UnAssimilatedBuckets.",
     *      tags={"UnAssimilatedBucket"},
     *      description="Get all UnAssimilatedBuckets",
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
     *                  @SWG\Items(ref="#/definitions/UnAssimilatedBucket")
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
        $this->unAssimilatedBucketRepository->pushCriteria(new RequestCriteria($request));
        $this->unAssimilatedBucketRepository->pushCriteria(new LimitOffsetCriteria($request));
        $unAssimilatedBuckets = $this->unAssimilatedBucketRepository->all();

        return $this->sendResponse($unAssimilatedBuckets->toArray(), 'Un Assimilated Buckets retrieved successfully');
    }

    /**
     * @param CreateUnAssimilatedBucketAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/unAssimilatedBuckets",
     *      summary="Store a newly created UnAssimilatedBucket in storage",
     *      tags={"UnAssimilatedBucket"},
     *      description="Store UnAssimilatedBucket",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="UnAssimilatedBucket that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/UnAssimilatedBucket")
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
     *                  ref="#/definitions/UnAssimilatedBucket"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateUnAssimilatedBucketAPIRequest $request)
    {
        $input = $request->all();

        $unAssimilatedBuckets = $this->unAssimilatedBucketRepository->create($input);

        return $this->sendResponse($unAssimilatedBuckets->toArray(), 'Un Assimilated Bucket saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/unAssimilatedBuckets/{id}",
     *      summary="Display the specified UnAssimilatedBucket",
     *      tags={"UnAssimilatedBucket"},
     *      description="Get UnAssimilatedBucket",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of UnAssimilatedBucket",
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
     *                  ref="#/definitions/UnAssimilatedBucket"
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
        /** @var UnAssimilatedBucket $unAssimilatedBucket */
        $unAssimilatedBucket = $this->unAssimilatedBucketRepository->findWithoutFail($id);

        if (empty($unAssimilatedBucket)) {
            return $this->sendError('Un Assimilated Bucket not found');
        }

        return $this->sendResponse($unAssimilatedBucket->toArray(), 'Un Assimilated Bucket retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateUnAssimilatedBucketAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/unAssimilatedBuckets/{id}",
     *      summary="Update the specified UnAssimilatedBucket in storage",
     *      tags={"UnAssimilatedBucket"},
     *      description="Update UnAssimilatedBucket",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of UnAssimilatedBucket",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="UnAssimilatedBucket that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/UnAssimilatedBucket")
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
     *                  ref="#/definitions/UnAssimilatedBucket"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateUnAssimilatedBucketAPIRequest $request)
    {
        $input = $request->all();

        /** @var UnAssimilatedBucket $unAssimilatedBucket */
        $unAssimilatedBucket = $this->unAssimilatedBucketRepository->findWithoutFail($id);

        if (empty($unAssimilatedBucket)) {
            return $this->sendError('Un Assimilated Bucket not found');
        }

        $unAssimilatedBucket = $this->unAssimilatedBucketRepository->update($input, $id);

        return $this->sendResponse($unAssimilatedBucket->toArray(), 'UnAssimilatedBucket updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/unAssimilatedBuckets/{id}",
     *      summary="Remove the specified UnAssimilatedBucket from storage",
     *      tags={"UnAssimilatedBucket"},
     *      description="Delete UnAssimilatedBucket",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of UnAssimilatedBucket",
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
        /** @var UnAssimilatedBucket $unAssimilatedBucket */
        $unAssimilatedBucket = $this->unAssimilatedBucketRepository->findWithoutFail($id);

        if (empty($unAssimilatedBucket)) {
            return $this->sendError('Un Assimilated Bucket not found');
        }

        $unAssimilatedBucket->delete();

        return $this->sendResponse($id, 'Un Assimilated Bucket deleted successfully');
    }
}
