<?php

namespace App\Modules\Servicemanager\Http\Controllers;

use App\Modules\Servicemanager\Http\Requests\CreateServiceDataCategoryProvisionRequest;
use App\Modules\Servicemanager\Http\Requests\UpdateServiceDataCategoryProvisionRequest;
use App\Modules\Servicemanager\Repositories\ServiceDataCategoryProvisionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ServiceDataCategoryProvisionController extends AppBaseController
{
    /** @var  ServiceDataCategoryProvisionRepository */
    private $serviceDataCategoryProvisionRepository;

    public function __construct(ServiceDataCategoryProvisionRepository $serviceDataCategoryProvisionRepo)
    {
        $this->serviceDataCategoryProvisionRepository = $serviceDataCategoryProvisionRepo;
    }

    /**
     * Display a listing of the ServiceDataCategoryProvision.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->serviceDataCategoryProvisionRepository->pushCriteria(new RequestCriteria($request));
        $serviceDataCategoryProvisions = $this->serviceDataCategoryProvisionRepository->all();

        return view('service_data_category_provisions.index')
            ->with('serviceDataCategoryProvisions', $serviceDataCategoryProvisions);
    }

    /**
     * Show the form for creating a new ServiceDataCategoryProvision.
     *
     * @return Response
     */
    public function create()
    {
        return view('service_data_category_provisions.create');
    }

    /**
     * Store a newly created ServiceDataCategoryProvision in storage.
     *
     * @param CreateServiceDataCategoryProvisionRequest $request
     *
     * @return Response
     */
    public function store(CreateServiceDataCategoryProvisionRequest $request)
    {
        $input = $request->all();

        $serviceDataCategoryProvision = $this->serviceDataCategoryProvisionRepository->create($input);

        Flash::success('Service Data Category Provision saved successfully.');

        return redirect(route('serviceDataCategoryProvisions.index'));
    }

    /**
     * Display the specified ServiceDataCategoryProvision.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $serviceDataCategoryProvision = $this->serviceDataCategoryProvisionRepository->findWithoutFail($id);

        if (empty($serviceDataCategoryProvision)) {
            Flash::error('Service Data Category Provision not found');

            return redirect(route('serviceDataCategoryProvisions.index'));
        }

        return view('service_data_category_provisions.show')->with('serviceDataCategoryProvision', $serviceDataCategoryProvision);
    }

    /**
     * Show the form for editing the specified ServiceDataCategoryProvision.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $serviceDataCategoryProvision = $this->serviceDataCategoryProvisionRepository->findWithoutFail($id);

        if (empty($serviceDataCategoryProvision)) {
            Flash::error('Service Data Category Provision not found');

            return redirect(route('serviceDataCategoryProvisions.index'));
        }

        return view('service_data_category_provisions.edit')->with('serviceDataCategoryProvision', $serviceDataCategoryProvision);
    }

    /**
     * Update the specified ServiceDataCategoryProvision in storage.
     *
     * @param  int              $id
     * @param UpdateServiceDataCategoryProvisionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateServiceDataCategoryProvisionRequest $request)
    {
        $serviceDataCategoryProvision = $this->serviceDataCategoryProvisionRepository->findWithoutFail($id);

        if (empty($serviceDataCategoryProvision)) {
            Flash::error('Service Data Category Provision not found');

            return redirect(route('serviceDataCategoryProvisions.index'));
        }

        $serviceDataCategoryProvision = $this->serviceDataCategoryProvisionRepository->update($request->all(), $id);

        Flash::success('Service Data Category Provision updated successfully.');

        return redirect(route('serviceDataCategoryProvisions.index'));
    }

    /**
     * Remove the specified ServiceDataCategoryProvision from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $serviceDataCategoryProvision = $this->serviceDataCategoryProvisionRepository->findWithoutFail($id);

        if (empty($serviceDataCategoryProvision)) {
            Flash::error('Service Data Category Provision not found');

            return redirect(route('serviceDataCategoryProvisions.index'));
        }

        $this->serviceDataCategoryProvisionRepository->delete($id);

        Flash::success('Service Data Category Provision deleted successfully.');

        return redirect(route('serviceDataCategoryProvisions.index'));
    }
}
