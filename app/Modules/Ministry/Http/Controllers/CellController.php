<?php

namespace App\Modules\ministry\Http\Controllers;

use App\Modules\ministry\Http\Requests\CreateCellRequest;
use App\Modules\ministry\Http\Requests\UpdateCellRequest;
use App\Modules\ministry\Repositories\CellRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CellController extends AppBaseController
{
    /** @var  CellRepository */
    private $cellRepository;

    public function __construct(CellRepository $cellRepo)
    {
        $this->cellRepository = $cellRepo;
    }

    /**
     * Display a listing of the Cell.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->cellRepository->pushCriteria(new RequestCriteria($request));
        $cells = $this->cellRepository->all();

        return view('cells.index')
            ->with('cells', $cells);
    }

    /**
     * Show the form for creating a new Cell.
     *
     * @return Response
     */
    public function create()
    {
        return view('cells.create');
    }

    /**
     * Store a newly created Cell in storage.
     *
     * @param CreateCellRequest $request
     *
     * @return Response
     */
    public function store(CreateCellRequest $request)
    {
        $input = $request->all();

        $cell = $this->cellRepository->create($input);

        Flash::success('Cell saved successfully.');

        return redirect(route('cells.index'));
    }

    /**
     * Display the specified Cell.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cell = $this->cellRepository->findWithoutFail($id);

        if (empty($cell)) {
            Flash::error('Cell not found');

            return redirect(route('cells.index'));
        }

        return view('cells.show')->with('cell', $cell);
    }

    /**
     * Show the form for editing the specified Cell.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cell = $this->cellRepository->findWithoutFail($id);

        if (empty($cell)) {
            Flash::error('Cell not found');

            return redirect(route('cells.index'));
        }

        return view('cells.edit')->with('cell', $cell);
    }

    /**
     * Update the specified Cell in storage.
     *
     * @param  int              $id
     * @param UpdateCellRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCellRequest $request)
    {
        $cell = $this->cellRepository->findWithoutFail($id);

        if (empty($cell)) {
            Flash::error('Cell not found');

            return redirect(route('cells.index'));
        }

        $cell = $this->cellRepository->update($request->all(), $id);

        Flash::success('Cell updated successfully.');

        return redirect(route('cells.index'));
    }

    /**
     * Remove the specified Cell from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cell = $this->cellRepository->findWithoutFail($id);

        if (empty($cell)) {
            Flash::error('Cell not found');

            return redirect(route('cells.index'));
        }

        $this->cellRepository->delete($id);

        Flash::success('Cell deleted successfully.');

        return redirect(route('cells.index'));
    }
}
