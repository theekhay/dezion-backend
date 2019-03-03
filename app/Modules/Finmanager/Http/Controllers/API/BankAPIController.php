<?php

namespace App\Modules\finmanager\Http\Controllers\API;

use App\Modules\finmanager\Http\Requests\API\CreateBankAPIRequest;
use App\Modules\finmanager\Http\Requests\API\UpdateBankAPIRequest;
use App\Modules\finmanager\Models\Bank;
use App\Modules\finmanager\Repositories\BankRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class BankController
 * @package App\Modules\finmanager\Http\Controllers\API
 */

class BankAPIController extends AppBaseController
{
    /** @var  BankRepository */
    private $bankRepository;

    public function __construct(BankRepository $bankRepo)
    {
        $this->bankRepository = $bankRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/banks",
     *      summary="Get a listing of the Banks.",
     *      tags={"Bank"},
     *      description="Get all Banks",
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
     *                  @SWG\Items(ref="#/definitions/Bank")
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
        $this->bankRepository->pushCriteria(new RequestCriteria($request));
        $this->bankRepository->pushCriteria(new LimitOffsetCriteria($request));
        $banks = $this->bankRepository->all();

        return $this->sendResponse($banks->toArray(), 'Banks retrieved successfully');
    }

    /**
     * @param CreateBankAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/banks",
     *      summary="Store a newly created Bank in storage",
     *      tags={"Bank"},
     *      description="Store Bank",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Bank that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Bank")
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
     *                  ref="#/definitions/Bank"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateBankAPIRequest $request)
    {
        $input = $request->all();

        $banks = $this->bankRepository->create($input);

        return $this->sendResponse($banks->toArray(), 'Bank saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/banks/{id}",
     *      summary="Display the specified Bank",
     *      tags={"Bank"},
     *      description="Get Bank",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Bank",
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
     *                  ref="#/definitions/Bank"
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
        /** @var Bank $bank */
        $bank = $this->bankRepository->findWithoutFail($id);

        if (empty($bank)) {
            return $this->sendError('Bank not found');
        }

        return $this->sendResponse($bank->toArray(), 'Bank retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateBankAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/banks/{id}",
     *      summary="Update the specified Bank in storage",
     *      tags={"Bank"},
     *      description="Update Bank",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Bank",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Bank that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Bank")
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
     *                  ref="#/definitions/Bank"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateBankAPIRequest $request)
    {
        $input = $request->all();

        /** @var Bank $bank */
        $bank = $this->bankRepository->findWithoutFail($id);

        if (empty($bank)) {
            return $this->sendError('Bank not found');
        }

        $bank = $this->bankRepository->update($input, $id);

        return $this->sendResponse($bank->toArray(), 'Bank updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/banks/{id}",
     *      summary="Remove the specified Bank from storage",
     *      tags={"Bank"},
     *      description="Delete Bank",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Bank",
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
        /** @var Bank $bank */
        $bank = $this->bankRepository->findWithoutFail($id);

        if (empty($bank)) {
            return $this->sendError('Bank not found');
        }

        $bank->delete();

        return $this->sendResponse($id, 'Bank deleted successfully');
    }
}
