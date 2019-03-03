<?php

namespace App\Modules\memberlocationmapping\Http\Controllers;

use App\Modules\memberlocationmapping\Http\Requests\CreateModelAddressProximityRequest;
use App\Modules\memberlocationmapping\Http\Requests\UpdateModelAddressProximityRequest;
use App\Modules\memberlocationmapping\Repositories\ModelAddressProximityRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ModelAddressProximityController extends AppBaseController
{
    /** @var  ModelAddressProximityRepository */
    private $modelAddressProximityRepository;

    public function __construct(ModelAddressProximityRepository $modelAddressProximityRepo)
    {
        $this->modelAddressProximityRepository = $modelAddressProximityRepo;
    }

    /**
     * Display a listing of the ModelAddressProximity.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->modelAddressProximityRepository->pushCriteria(new RequestCriteria($request));
        $modelAddressProximities = $this->modelAddressProximityRepository->all();

        return view('model_address_proximities.index')
            ->with('modelAddressProximities', $modelAddressProximities);
    }

    /**
     * Show the form for creating a new ModelAddressProximity.
     *
     * @return Response
     */
    public function create()
    {
        return view('model_address_proximities.create');
    }

    /**
     * Store a newly created ModelAddressProximity in storage.
     *
     * @param CreateModelAddressProximityRequest $request
     *
     * @return Response
     */
    public function store(CreateModelAddressProximityRequest $request)
    {
        $input = $request->all();

        $modelAddressProximity = $this->modelAddressProximityRepository->create($input);

        Flash::success('Model Address Proximity saved successfully.');

        return redirect(route('modelAddressProximities.index'));
    }

    /**
     * Display the specified ModelAddressProximity.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $modelAddressProximity = $this->modelAddressProximityRepository->findWithoutFail($id);

        if (empty($modelAddressProximity)) {
            Flash::error('Model Address Proximity not found');

            return redirect(route('modelAddressProximities.index'));
        }

        return view('model_address_proximities.show')->with('modelAddressProximity', $modelAddressProximity);
    }

    /**
     * Show the form for editing the specified ModelAddressProximity.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $modelAddressProximity = $this->modelAddressProximityRepository->findWithoutFail($id);

        if (empty($modelAddressProximity)) {
            Flash::error('Model Address Proximity not found');

            return redirect(route('modelAddressProximities.index'));
        }

        return view('model_address_proximities.edit')->with('modelAddressProximity', $modelAddressProximity);
    }

    /**
     * Update the specified ModelAddressProximity in storage.
     *
     * @param  int              $id
     * @param UpdateModelAddressProximityRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateModelAddressProximityRequest $request)
    {
        $modelAddressProximity = $this->modelAddressProximityRepository->findWithoutFail($id);

        if (empty($modelAddressProximity)) {
            Flash::error('Model Address Proximity not found');

            return redirect(route('modelAddressProximities.index'));
        }

        $modelAddressProximity = $this->modelAddressProximityRepository->update($request->all(), $id);

        Flash::success('Model Address Proximity updated successfully.');

        return redirect(route('modelAddressProximities.index'));
    }

    /**
     * Remove the specified ModelAddressProximity from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $modelAddressProximity = $this->modelAddressProximityRepository->findWithoutFail($id);

        if (empty($modelAddressProximity)) {
            Flash::error('Model Address Proximity not found');

            return redirect(route('modelAddressProximities.index'));
        }

        $this->modelAddressProximityRepository->delete($id);

        Flash::success('Model Address Proximity deleted successfully.');

        return redirect(route('modelAddressProximities.index'));
    }
}
