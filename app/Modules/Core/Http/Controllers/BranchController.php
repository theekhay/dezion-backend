<?php

namespace App\Modules\Core\Http\Controllers;

use App\Modules\Core\Http\Requests\CreateBranchRequest;
use App\Modules\Core\Http\Requests\UpdateBranchRequest;
use App\Modules\Core\Repositories\BranchRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class BranchController extends AppBaseController
{
    /** @var  BranchRepository */
    private $branchRepository;

    public function __construct(BranchRepository $branchRepo)
    {
        $this->branchRepository = $branchRepo;
    }

    /**
     * Display a listing of the Branch.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->branchRepository->pushCriteria(new RequestCriteria($request));
        $branches = $this->branchRepository->all();

        return view('branches.index')
            ->with('branches', $branches);
    }

    /**
     * Show the form for creating a new Branch.
     *
     * @return Response
     */
    public function create()
    {
        return view('branches.create');
    }

    /**
     * Store a newly created Branch in storage.
     *
     * @param CreateBranchRequest $request
     *
     * @return Response
     */
    public function store(CreateBranchRequest $request)
    {
        $input = $request->all();

        $branch = $this->branchRepository->create($input);

        Flash::success('Branch saved successfully.');

        return redirect(route('branches.index'));
    }

    /**
     * Display the specified Branch.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $branch = $this->branchRepository->findWithoutFail($id);

        if (empty($branch)) {
            Flash::error('Branch not found');

            return redirect(route('branches.index'));
        }

        return view('branches.show')->with('branch', $branch);
    }

    /**
     * Show the form for editing the specified Branch.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $branch = $this->branchRepository->findWithoutFail($id);

        if (empty($branch)) {
            Flash::error('Branch not found');

            return redirect(route('branches.index'));
        }

        return view('branches.edit')->with('branch', $branch);
    }

    /**
     * Update the specified Branch in storage.
     *
     * @param  int              $id
     * @param UpdateBranchRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBranchRequest $request)
    {
        $branch = $this->branchRepository->findWithoutFail($id);

        if (empty($branch)) {
            Flash::error('Branch not found');

            return redirect(route('branches.index'));
        }

        $branch = $this->branchRepository->update($request->all(), $id);

        Flash::success('Branch updated successfully.');

        return redirect(route('branches.index'));
    }

    /**
     * Remove the specified Branch from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $branch = $this->branchRepository->findWithoutFail($id);

        if (empty($branch)) {
            Flash::error('Branch not found');

            return redirect(route('branches.index'));
        }

        $this->branchRepository->delete($id);

        Flash::success('Branch deleted successfully.');

        return redirect(route('branches.index'));
    }
}
