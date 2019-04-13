<?php

namespace App\Modules\finmanager\Http\Controllers\API;

use App\Modules\finmanager\Http\Requests\API\CreateCardAPIRequest;
use App\Modules\finmanager\Http\Requests\API\UpdateCardAPIRequest;
use App\Modules\finmanager\Models\Card;
use App\Modules\finmanager\Repositories\CardRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class CardController
 * @package App\Modules\finmanager\Http\Controllers\API
 */

class CardAPIController extends AppBaseController
{
    /** @var  CardRepository */
    private $cardRepository;

    public function __construct(CardRepository $cardRepo)
    {
        $this->cardRepository = $cardRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/cards",
     *      summary="Get a listing of the Cards.",
     *      tags={"Card"},
     *      description="Get all Cards",
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
     *                  @SWG\Items(ref="#/definitions/Card")
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
        $this->cardRepository->pushCriteria(new RequestCriteria($request));
        $this->cardRepository->pushCriteria(new LimitOffsetCriteria($request));
        $cards = $this->cardRepository->all();

        return $this->sendResponse($cards->toArray(), 'Cards retrieved successfully');
    }

    /**
     * @param CreateCardAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/cards",
     *      summary="Store a newly created Card in storage",
     *      tags={"Card"},
     *      description="Store Card",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Card that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Card")
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
     *                  ref="#/definitions/Card"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateCardAPIRequest $request)
    {
        $input = $request->all();

        $cards = $this->cardRepository->create($input);

        return $this->sendResponse($cards->toArray(), 'Card saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/cards/{id}",
     *      summary="Display the specified Card",
     *      tags={"Card"},
     *      description="Get Card",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Card",
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
     *                  ref="#/definitions/Card"
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
        /** @var Card $card */
        $card = $this->cardRepository->findWithoutFail($id);

        if (empty($card)) {
            return $this->sendError('Card not found');
        }

        return $this->sendResponse($card->toArray(), 'Card retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateCardAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/cards/{id}",
     *      summary="Update the specified Card in storage",
     *      tags={"Card"},
     *      description="Update Card",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Card",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Card that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Card")
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
     *                  ref="#/definitions/Card"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateCardAPIRequest $request)
    {
        $input = $request->all();

        /** @var Card $card */
        $card = $this->cardRepository->findWithoutFail($id);

        if (empty($card)) {
            return $this->sendError('Card not found');
        }

        $card = $this->cardRepository->update($input, $id);

        return $this->sendResponse($card->toArray(), 'Card updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/cards/{id}",
     *      summary="Remove the specified Card from storage",
     *      tags={"Card"},
     *      description="Delete Card",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Card",
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
        /** @var Card $card */
        $card = $this->cardRepository->findWithoutFail($id);

        if (empty($card)) {
            return $this->sendError('Card not found');
        }

        $card->delete();

        return $this->sendResponse($id, 'Card deleted successfully');
    }
}
