<?php

namespace App\Modules\Membership\Http\Controllers;

use App\Modules\Membership\Http\Requests\CreateBulkMemberImportRequest;
use App\Modules\Membership\Http\Requests\UpdateBulkMemberImportRequest;
use App\Modules\Membership\Repositories\BulkMemberImportRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class BulkMemberImportController extends AppBaseController
{
    /** @var  BulkMemberImportRepository */
    private $bulkMemberImportRepository;

    public function __construct(BulkMemberImportRepository $bulkMemberImportRepo)
    {
        $this->bulkMemberImportRepository = $bulkMemberImportRepo;
    }

    /**
     * Display a listing of the BulkMemberImport.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->bulkMemberImportRepository->pushCriteria(new RequestCriteria($request));
        $bulkMemberImports = $this->bulkMemberImportRepository->all();

        return view('bulk_member_imports.index')
            ->with('bulkMemberImports', $bulkMemberImports);
    }

    /**
     * Show the form for creating a new BulkMemberImport.
     *
     * @return Response
     */
    public function create()
    {
        return view('bulk_member_imports.create');
    }

    /**
     * Store a newly created BulkMemberImport in storage.
     *
     * @param CreateBulkMemberImportRequest $request
     *
     * @return Response
     */
    public function store(CreateBulkMemberImportRequest $request)
    {
        $input = $request->all();

        $bulkMemberImport = $this->bulkMemberImportRepository->create($input);

        Flash::success('Bulk Member Import saved successfully.');

        return redirect(route('bulkMemberImports.index'));
    }

    /**
     * Display the specified BulkMemberImport.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bulkMemberImport = $this->bulkMemberImportRepository->findWithoutFail($id);

        if (empty($bulkMemberImport)) {
            Flash::error('Bulk Member Import not found');

            return redirect(route('bulkMemberImports.index'));
        }

        return view('bulk_member_imports.show')->with('bulkMemberImport', $bulkMemberImport);
    }

    /**
     * Show the form for editing the specified BulkMemberImport.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bulkMemberImport = $this->bulkMemberImportRepository->findWithoutFail($id);

        if (empty($bulkMemberImport)) {
            Flash::error('Bulk Member Import not found');

            return redirect(route('bulkMemberImports.index'));
        }

        return view('bulk_member_imports.edit')->with('bulkMemberImport', $bulkMemberImport);
    }

    /**
     * Update the specified BulkMemberImport in storage.
     *
     * @param  int              $id
     * @param UpdateBulkMemberImportRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBulkMemberImportRequest $request)
    {
        $bulkMemberImport = $this->bulkMemberImportRepository->findWithoutFail($id);

        if (empty($bulkMemberImport)) {
            Flash::error('Bulk Member Import not found');

            return redirect(route('bulkMemberImports.index'));
        }

        $bulkMemberImport = $this->bulkMemberImportRepository->update($request->all(), $id);

        Flash::success('Bulk Member Import updated successfully.');

        return redirect(route('bulkMemberImports.index'));
    }

    /**
     * Remove the specified BulkMemberImport from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bulkMemberImport = $this->bulkMemberImportRepository->findWithoutFail($id);

        if (empty($bulkMemberImport)) {
            Flash::error('Bulk Member Import not found');

            return redirect(route('bulkMemberImports.index'));
        }

        $this->bulkMemberImportRepository->delete($id);

        Flash::success('Bulk Member Import deleted successfully.');

        return redirect(route('bulkMemberImports.index'));
    }
}
