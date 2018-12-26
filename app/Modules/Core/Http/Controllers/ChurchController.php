<?php

namespace App\Modules\Core\Http\Controllers;

use App\Modules\Core\Http\Requests\CreateChurchRequest;
use App\Modules\Core\Http\Requests\UpdateChurchRequest;
use App\Modules\Core\Repositories\ChurchRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ChurchController extends AppBaseController
{
    /** @var  ChurchRepository */
    private $churchRepository;

    public function __construct(ChurchRepository $churchRepo)
    {
        $this->churchRepository = $churchRepo;
    }

    /**
     * Display a listing of the Church.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->churchRepository->pushCriteria(new RequestCriteria($request));
        $churches = $this->churchRepository->all();

        return view('churches.index')
            ->with('churches', $churches);
    }

    /**
     * Show the form for creating a new Church.
     *
     * @return Response
     */
    public function create()
    {
        return view('churches.create');
    }

    /**
     * Store a newly created Church in storage.
     *
     * @param CreateChurchRequest $request
     *
     * @return Response
     */
    public function store(CreateChurchRequest $request)
    {
        $input = $request->all();

        $church = $this->churchRepository->create($input);

        Flash::success('Church saved successfully.');

        return redirect(route('churches.index'));
    }

    /**
     * Display the specified Church.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $church = $this->churchRepository->findWithoutFail($id);

        if (empty($church)) {
            Flash::error('Church not found');

            return redirect(route('churches.index'));
        }

        return view('churches.show')->with('church', $church);
    }

    /**
     * Show the form for editing the specified Church.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $church = $this->churchRepository->findWithoutFail($id);

        if (empty($church)) {
            Flash::error('Church not found');

            return redirect(route('churches.index'));
        }

        return view('churches.edit')->with('church', $church);
    }

    /**
     * Update the specified Church in storage.
     *
     * @param  int              $id
     * @param UpdateChurchRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateChurchRequest $request)
    {
        $church = $this->churchRepository->findWithoutFail($id);

        if (empty($church)) {
            Flash::error('Church not found');

            return redirect(route('churches.index'));
        }

        $church = $this->churchRepository->update($request->all(), $id);

        Flash::success('Church updated successfully.');

        return redirect(route('churches.index'));
    }

    /**
     * Remove the specified Church from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $church = $this->churchRepository->findWithoutFail($id);

        if (empty($church)) {
            Flash::error('Church not found');

            return redirect(route('churches.index'));
        }

        $this->churchRepository->delete($id);

        Flash::success('Church deleted successfully.');

        return redirect(route('churches.index'));
    }
}
