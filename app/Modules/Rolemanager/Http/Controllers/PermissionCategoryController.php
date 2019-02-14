<?php

namespace App\Modules\rolemanager\Http\Controllers;

use App\Modules\rolemanager\Http\Requests\CreatePermissionCategoryRequest;
use App\Modules\rolemanager\Http\Requests\UpdatePermissionCategoryRequest;
use App\Modules\rolemanager\Repositories\PermissionCategoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PermissionCategoryController extends AppBaseController
{
    /** @var  PermissionCategoryRepository */
    private $permissionCategoryRepository;

    public function __construct(PermissionCategoryRepository $permissionCategoryRepo)
    {
        $this->permissionCategoryRepository = $permissionCategoryRepo;
    }

    /**
     * Display a listing of the PermissionCategory.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->permissionCategoryRepository->pushCriteria(new RequestCriteria($request));
        $permissionCategories = $this->permissionCategoryRepository->all();

        return view('permission_categories.index')
            ->with('permissionCategories', $permissionCategories);
    }

    /**
     * Show the form for creating a new PermissionCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('permission_categories.create');
    }

    /**
     * Store a newly created PermissionCategory in storage.
     *
     * @param CreatePermissionCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreatePermissionCategoryRequest $request)
    {
        $input = $request->all();

        $permissionCategory = $this->permissionCategoryRepository->create($input);

        Flash::success('Permission Category saved successfully.');

        return redirect(route('permissionCategories.index'));
    }

    /**
     * Display the specified PermissionCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $permissionCategory = $this->permissionCategoryRepository->findWithoutFail($id);

        if (empty($permissionCategory)) {
            Flash::error('Permission Category not found');

            return redirect(route('permissionCategories.index'));
        }

        return view('permission_categories.show')->with('permissionCategory', $permissionCategory);
    }

    /**
     * Show the form for editing the specified PermissionCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $permissionCategory = $this->permissionCategoryRepository->findWithoutFail($id);

        if (empty($permissionCategory)) {
            Flash::error('Permission Category not found');

            return redirect(route('permissionCategories.index'));
        }

        return view('permission_categories.edit')->with('permissionCategory', $permissionCategory);
    }

    /**
     * Update the specified PermissionCategory in storage.
     *
     * @param  int              $id
     * @param UpdatePermissionCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePermissionCategoryRequest $request)
    {
        $permissionCategory = $this->permissionCategoryRepository->findWithoutFail($id);

        if (empty($permissionCategory)) {
            Flash::error('Permission Category not found');

            return redirect(route('permissionCategories.index'));
        }

        $permissionCategory = $this->permissionCategoryRepository->update($request->all(), $id);

        Flash::success('Permission Category updated successfully.');

        return redirect(route('permissionCategories.index'));
    }

    /**
     * Remove the specified PermissionCategory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $permissionCategory = $this->permissionCategoryRepository->findWithoutFail($id);

        if (empty($permissionCategory)) {
            Flash::error('Permission Category not found');

            return redirect(route('permissionCategories.index'));
        }

        $this->permissionCategoryRepository->delete($id);

        Flash::success('Permission Category deleted successfully.');

        return redirect(route('permissionCategories.index'));
    }
}
