<?php

namespace App\Modules\Servicemanager\Http\Controllers;

use App\Modules\Servicemanager\Http\Requests\CreateServiceDataComponentRequest;
use App\Modules\Servicemanager\Http\Requests\UpdateServiceDataComponentRequest;
use App\Modules\Servicemanager\Repositories\ServiceDataComponentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ServiceDataComponentController extends AppBaseController
{
    /** @var  ServiceDataComponentRepository */
    private $serviceDataComponentRepository;

    public function __construct(ServiceDataComponentRepository $serviceDataComponentRepo)
    {
        $this->serviceDataComponentRepository = $serviceDataComponentRepo;
    }

    /**
     * Display a listing of the ServiceDataComponent.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->serviceDataComponentRepository->pushCriteria(new RequestCriteria($request));
        $serviceDataComponents = $this->serviceDataComponentRepository->all();

        return view('service_data_components.index')
            ->with('serviceDataComponents', $serviceDataComponents);
    }

    /**
     * Show the form for creating a new ServiceDataComponent.
     *
     * @return Response
     */
    public function create()
    {
        return view('service_data_components.create');
    }

    /**
     * Store a newly created ServiceDataComponent in storage.
     *
     * @param CreateServiceDataComponentRequest $request
     *
     * @return Response
     */
    public function store(CreateServiceDataComponentRequest $request)
    {
        $input = $request->all();

        $serviceDataComponent = $this->serviceDataComponentRepository->create($input);

        Flash::success('Service Data Component saved successfully.');

        return redirect(route('serviceDataComponents.index'));
    }

    /**
     * Display the specified ServiceDataComponent.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $serviceDataComponent = $this->serviceDataComponentRepository->findWithoutFail($id);

        if (empty($serviceDataComponent)) {
            Flash::error('Service Data Component not found');

            return redirect(route('serviceDataComponents.index'));
        }

        return view('service_data_components.show')->with('serviceDataComponent', $serviceDataComponent);
    }

    /**
     * Show the form for editing the specified ServiceDataComponent.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $serviceDataComponent = $this->serviceDataComponentRepository->findWithoutFail($id);

        if (empty($serviceDataComponent)) {
            Flash::error('Service Data Component not found');

            return redirect(route('serviceDataComponents.index'));
        }

        return view('service_data_components.edit')->with('serviceDataComponent', $serviceDataComponent);
    }

    /**
     * Update the specified ServiceDataComponent in storage.
     *
     * @param  int              $id
     * @param UpdateServiceDataComponentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateServiceDataComponentRequest $request)
    {
        $serviceDataComponent = $this->serviceDataComponentRepository->findWithoutFail($id);

        if (empty($serviceDataComponent)) {
            Flash::error('Service Data Component not found');

            return redirect(route('serviceDataComponents.index'));
        }

        $serviceDataComponent = $this->serviceDataComponentRepository->update($request->all(), $id);

        Flash::success('Service Data Component updated successfully.');

        return redirect(route('serviceDataComponents.index'));
    }

    /**
     * Remove the specified ServiceDataComponent from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $serviceDataComponent = $this->serviceDataComponentRepository->findWithoutFail($id);

        if (empty($serviceDataComponent)) {
            Flash::error('Service Data Component not found');

            return redirect(route('serviceDataComponents.index'));
        }

        $this->serviceDataComponentRepository->delete($id);

        Flash::success('Service Data Component deleted successfully.');

        return redirect(route('serviceDataComponents.index'));
    }
}
