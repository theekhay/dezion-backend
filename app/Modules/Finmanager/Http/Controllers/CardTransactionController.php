<?php

namespace App\Modules\finmanager\Http\Controllers;

use App\Modules\finmanager\Http\Requests\CreateCardTransactionRequest;
use App\Modules\finmanager\Http\Requests\UpdateCardTransactionRequest;
use App\Modules\finmanager\Repositories\CardTransactionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CardTransactionController extends AppBaseController
{
    /** @var  CardTransactionRepository */
    private $cardTransactionRepository;

    public function __construct(CardTransactionRepository $cardTransactionRepo)
    {
        $this->cardTransactionRepository = $cardTransactionRepo;
    }

    /**
     * Display a listing of the CardTransaction.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->cardTransactionRepository->pushCriteria(new RequestCriteria($request));
        $cardTransactions = $this->cardTransactionRepository->all();

        return view('card_transactions.index')
            ->with('cardTransactions', $cardTransactions);
    }

    /**
     * Show the form for creating a new CardTransaction.
     *
     * @return Response
     */
    public function create()
    {
        return view('card_transactions.create');
    }

    /**
     * Store a newly created CardTransaction in storage.
     *
     * @param CreateCardTransactionRequest $request
     *
     * @return Response
     */
    public function store(CreateCardTransactionRequest $request)
    {
        $input = $request->all();

        $cardTransaction = $this->cardTransactionRepository->create($input);

        Flash::success('Card Transaction saved successfully.');

        return redirect(route('cardTransactions.index'));
    }

    /**
     * Display the specified CardTransaction.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cardTransaction = $this->cardTransactionRepository->findWithoutFail($id);

        if (empty($cardTransaction)) {
            Flash::error('Card Transaction not found');

            return redirect(route('cardTransactions.index'));
        }

        return view('card_transactions.show')->with('cardTransaction', $cardTransaction);
    }

    /**
     * Show the form for editing the specified CardTransaction.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cardTransaction = $this->cardTransactionRepository->findWithoutFail($id);

        if (empty($cardTransaction)) {
            Flash::error('Card Transaction not found');

            return redirect(route('cardTransactions.index'));
        }

        return view('card_transactions.edit')->with('cardTransaction', $cardTransaction);
    }

    /**
     * Update the specified CardTransaction in storage.
     *
     * @param  int              $id
     * @param UpdateCardTransactionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCardTransactionRequest $request)
    {
        $cardTransaction = $this->cardTransactionRepository->findWithoutFail($id);

        if (empty($cardTransaction)) {
            Flash::error('Card Transaction not found');

            return redirect(route('cardTransactions.index'));
        }

        $cardTransaction = $this->cardTransactionRepository->update($request->all(), $id);

        Flash::success('Card Transaction updated successfully.');

        return redirect(route('cardTransactions.index'));
    }

    /**
     * Remove the specified CardTransaction from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cardTransaction = $this->cardTransactionRepository->findWithoutFail($id);

        if (empty($cardTransaction)) {
            Flash::error('Card Transaction not found');

            return redirect(route('cardTransactions.index'));
        }

        $this->cardTransactionRepository->delete($id);

        Flash::success('Card Transaction deleted successfully.');

        return redirect(route('cardTransactions.index'));
    }
}
