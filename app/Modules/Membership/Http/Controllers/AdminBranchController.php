<?php

namespace App\Modules\Membership\Http\Controllers;

use App\Modules\Membership\Http\Requests\CreateAdminBranchRequest;
use App\Modules\Membership\Http\Requests\UpdateAdminBranchRequest;
use App\Modules\Membership\Repositories\AdminBranchRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AdminBranchController extends AppBaseController
{
    /** @var  AdminBranchRepository */
    private $adminBranchRepository;

    public function __construct(AdminBranchRepository $adminBranchRepo)
    {
        $this->adminBranchRepository = $adminBranchRepo;
    }

    /**
     * Display a listing of the AdminBranch.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->adminBranchRepository->pushCriteria(new RequestCriteria($request));
        $adminBranches = $this->adminBranchRepository->all();

        return view('admin_branches.index')
            ->with('adminBranches', $adminBranches);
    }

    /**
     * Show the form for creating a new AdminBranch.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin_branches.create');
    }

    /**
     * Store a newly created AdminBranch in storage.
     *
     * @param CreateAdminBranchRequest $request
     *
     * @return Response
     */
    public function store(CreateAdminBranchRequest $request)
    {
        $input = $request->all();

        $adminBranch = $this->adminBranchRepository->create($input);

        Flash::success('Admin Branch saved successfully.');

        return redirect(route('adminBranches.index'));
    }

    /**
     * Display the specified AdminBranch.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $adminBranch = $this->adminBranchRepository->findWithoutFail($id);

        if (empty($adminBranch)) {
            Flash::error('Admin Branch not found');

            return redirect(route('adminBranches.index'));
        }

        return view('admin_branches.show')->with('adminBranch', $adminBranch);
    }

    /**
     * Show the form for editing the specified AdminBranch.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $adminBranch = $this->adminBranchRepository->findWithoutFail($id);

        if (empty($adminBranch)) {
            Flash::error('Admin Branch not found');

            return redirect(route('adminBranches.index'));
        }

        return view('admin_branches.edit')->with('adminBranch', $adminBranch);
    }

    /**
     * Update the specified AdminBranch in storage.
     *
     * @param  int              $id
     * @param UpdateAdminBranchRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAdminBranchRequest $request)
    {
        $adminBranch = $this->adminBranchRepository->findWithoutFail($id);

        if (empty($adminBranch)) {
            Flash::error('Admin Branch not found');

            return redirect(route('adminBranches.index'));
        }

        $adminBranch = $this->adminBranchRepository->update($request->all(), $id);

        Flash::success('Admin Branch updated successfully.');

        return redirect(route('adminBranches.index'));
    }

    /**
     * Remove the specified AdminBranch from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $adminBranch = $this->adminBranchRepository->findWithoutFail($id);

        if (empty($adminBranch)) {
            Flash::error('Admin Branch not found');

            return redirect(route('adminBranches.index'));
        }

        $this->adminBranchRepository->delete($id);

        Flash::success('Admin Branch deleted successfully.');

        return redirect(route('adminBranches.index'));
    }
}
