<?php

namespace App\Modules\Servicemanager\Http\Controllers;

use App\Modules\Servicemanager\Http\Requests\CreateServiceDataCategoryRequest;
use App\Modules\Servicemanager\Http\Requests\UpdateServiceDataCategoryRequest;
use App\Modules\Servicemanager\Repositories\ServiceDataCategoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ServiceDataCategoryController extends AppBaseController
{
    /** @var  ServiceDataCategoryRepository */
    private $serviceDataCategoryRepository;

    public function __construct(ServiceDataCategoryRepository $serviceDataCategoryRepo)
    {
        $this->serviceDataCategoryRepository = $serviceDataCategoryRepo;
    }

    /**
     * Display a listing of the ServiceDataCategory.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->serviceDataCategoryRepository->pushCriteria(new RequestCriteria($request));
        $serviceDataCategories = $this->serviceDataCategoryRepository->all();

        return view('service_data_categories.index')
            ->with('serviceDataCategories', $serviceDataCategories);
    }

    /**
     * Show the form for creating a new ServiceDataCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('service_data_categories.create');
    }

    /**
     * Store a newly created ServiceDataCategory in storage.
     *
     * @param CreateServiceDataCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateServiceDataCategoryRequest $request)
    {
        $input = $request->all();

        $serviceDataCategory = $this->serviceDataCategoryRepository->create($input);

        Flash::success('Service Data Category saved successfully.');

        return redirect(route('serviceDataCategories.index'));
    }

    /**
     * Display the specified ServiceDataCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $serviceDataCategory = $this->serviceDataCategoryRepository->findWithoutFail($id);

        if (empty($serviceDataCategory)) {
            Flash::error('Service Data Category not found');

            return redirect(route('serviceDataCategories.index'));
        }

        return view('service_data_categories.show')->with('serviceDataCategory', $serviceDataCategory);
    }

    /**
     * Show the form for editing the specified ServiceDataCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $serviceDataCategory = $this->serviceDataCategoryRepository->findWithoutFail($id);

        if (empty($serviceDataCategory)) {
            Flash::error('Service Data Category not found');

            return redirect(route('serviceDataCategories.index'));
        }

        return view('service_data_categories.edit')->with('serviceDataCategory', $serviceDataCategory);
    }

    /**
     * Update the specified ServiceDataCategory in storage.
     *
     * @param  int              $id
     * @param UpdateServiceDataCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateServiceDataCategoryRequest $request)
    {
        $serviceDataCategory = $this->serviceDataCategoryRepository->findWithoutFail($id);

        if (empty($serviceDataCategory)) {
            Flash::error('Service Data Category not found');

            return redirect(route('serviceDataCategories.index'));
        }

        $serviceDataCategory = $this->serviceDataCategoryRepository->update($request->all(), $id);

        Flash::success('Service Data Category updated successfully.');

        return redirect(route('serviceDataCategories.index'));
    }

    /**
     * Remove the specified ServiceDataCategory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $serviceDataCategory = $this->serviceDataCategoryRepository->findWithoutFail($id);

        if (empty($serviceDataCategory)) {
            Flash::error('Service Data Category not found');

            return redirect(route('serviceDataCategories.index'));
        }

        $this->serviceDataCategoryRepository->delete($id);

        Flash::success('Service Data Category deleted successfully.');

        return redirect(route('serviceDataCategories.index'));
    }
}
