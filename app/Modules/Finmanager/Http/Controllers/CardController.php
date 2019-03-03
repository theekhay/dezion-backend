<?php

namespace App\Modules\finmanager\Http\Controllers;

use App\Modules\finmanager\Http\Requests\CreateCardRequest;
use App\Modules\finmanager\Http\Requests\UpdateCardRequest;
use App\Modules\finmanager\Repositories\CardRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CardController extends AppBaseController
{
    /** @var  CardRepository */
    private $cardRepository;

    public function __construct(CardRepository $cardRepo)
    {
        $this->cardRepository = $cardRepo;
    }

    /**
     * Display a listing of the Card.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->cardRepository->pushCriteria(new RequestCriteria($request));
        $cards = $this->cardRepository->all();

        return view('cards.index')
            ->with('cards', $cards);
    }

    /**
     * Show the form for creating a new Card.
     *
     * @return Response
     */
    public function create()
    {
        return view('cards.create');
    }

    /**
     * Store a newly created Card in storage.
     *
     * @param CreateCardRequest $request
     *
     * @return Response
     */
    public function store(CreateCardRequest $request)
    {
        $input = $request->all();

        $card = $this->cardRepository->create($input);

        Flash::success('Card saved successfully.');

        return redirect(route('cards.index'));
    }

    /**
     * Display the specified Card.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $card = $this->cardRepository->findWithoutFail($id);

        if (empty($card)) {
            Flash::error('Card not found');

            return redirect(route('cards.index'));
        }

        return view('cards.show')->with('card', $card);
    }

    /**
     * Show the form for editing the specified Card.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $card = $this->cardRepository->findWithoutFail($id);

        if (empty($card)) {
            Flash::error('Card not found');

            return redirect(route('cards.index'));
        }

        return view('cards.edit')->with('card', $card);
    }

    /**
     * Update the specified Card in storage.
     *
     * @param  int              $id
     * @param UpdateCardRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCardRequest $request)
    {
        $card = $this->cardRepository->findWithoutFail($id);

        if (empty($card)) {
            Flash::error('Card not found');

            return redirect(route('cards.index'));
        }

        $card = $this->cardRepository->update($request->all(), $id);

        Flash::success('Card updated successfully.');

        return redirect(route('cards.index'));
    }

    /**
     * Remove the specified Card from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $card = $this->cardRepository->findWithoutFail($id);

        if (empty($card)) {
            Flash::error('Card not found');

            return redirect(route('cards.index'));
        }

        $this->cardRepository->delete($id);

        Flash::success('Card deleted successfully.');

        return redirect(route('cards.index'));
    }
}
