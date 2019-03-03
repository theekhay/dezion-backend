<?php

namespace App\Modules\finmanager\Http\Controllers\API;

use App\Modules\finmanager\Http\Requests\API\CreateCardTransactionAPIRequest;
use App\Modules\finmanager\Http\Requests\API\UpdateCardTransactionAPIRequest;
use App\Modules\finmanager\Models\CardTransaction;
use App\Modules\finmanager\Repositories\CardTransactionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class CardTransactionController
 * @package App\Modules\finmanager\Http\Controllers\API
 */

class CardTransactionAPIController extends AppBaseController
{
    /** @var  CardTransactionRepository */
    private $cardTransactionRepository;

    public function __construct(CardTransactionRepository $cardTransactionRepo)
    {
        $this->cardTransactionRepository = $cardTransactionRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/cardTransactions",
     *      summary="Get a listing of the CardTransactions.",
     *      tags={"CardTransaction"},
     *      description="Get all CardTransactions",
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
     *                  @SWG\Items(ref="#/definitions/CardTransaction")
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
        $this->cardTransactionRepository->pushCriteria(new RequestCriteria($request));
        $this->cardTransactionRepository->pushCriteria(new LimitOffsetCriteria($request));
        $cardTransactions = $this->cardTransactionRepository->all();

        return $this->sendResponse($cardTransactions->toArray(), 'Card Transactions retrieved successfully');
    }

    /**
     * @param CreateCardTransactionAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/cardTransactions",
     *      summary="Store a newly created CardTransaction in storage",
     *      tags={"CardTransaction"},
     *      description="Store CardTransaction",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="CardTransaction that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/CardTransaction")
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
     *                  ref="#/definitions/CardTransaction"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateCardTransactionAPIRequest $request)
    {
        $input = $request->all();

        $cardTransactions = $this->cardTransactionRepository->create($input);

        return $this->sendResponse($cardTransactions->toArray(), 'Card Transaction saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/cardTransactions/{id}",
     *      summary="Display the specified CardTransaction",
     *      tags={"CardTransaction"},
     *      description="Get CardTransaction",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of CardTransaction",
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
     *                  ref="#/definitions/CardTransaction"
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
        /** @var CardTransaction $cardTransaction */
        $cardTransaction = $this->cardTransactionRepository->findWithoutFail($id);

        if (empty($cardTransaction)) {
            return $this->sendError('Card Transaction not found');
        }

        return $this->sendResponse($cardTransaction->toArray(), 'Card Transaction retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateCardTransactionAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/cardTransactions/{id}",
     *      summary="Update the specified CardTransaction in storage",
     *      tags={"CardTransaction"},
     *      description="Update CardTransaction",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of CardTransaction",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="CardTransaction that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/CardTransaction")
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
     *                  ref="#/definitions/CardTransaction"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateCardTransactionAPIRequest $request)
    {
        $input = $request->all();

        /** @var CardTransaction $cardTransaction */
        $cardTransaction = $this->cardTransactionRepository->findWithoutFail($id);

        if (empty($cardTransaction)) {
            return $this->sendError('Card Transaction not found');
        }

        $cardTransaction = $this->cardTransactionRepository->update($input, $id);

        return $this->sendResponse($cardTransaction->toArray(), 'CardTransaction updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/cardTransactions/{id}",
     *      summary="Remove the specified CardTransaction from storage",
     *      tags={"CardTransaction"},
     *      description="Delete CardTransaction",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of CardTransaction",
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
        /** @var CardTransaction $cardTransaction */
        $cardTransaction = $this->cardTransactionRepository->findWithoutFail($id);

        if (empty($cardTransaction)) {
            return $this->sendError('Card Transaction not found');
        }

        $cardTransaction->delete();

        return $this->sendResponse($id, 'Card Transaction deleted successfully');
    }
}
