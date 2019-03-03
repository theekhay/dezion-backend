<?php

namespace App\Modules\Membership\Http\Controllers;

use App\Modules\Membership\Http\Requests\CreateCellMemberMappingRequest;
use App\Modules\Membership\Http\Requests\UpdateCellMemberMappingRequest;
use App\Modules\Membership\Repositories\CellMemberMappingRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;


class CellMemberMappingController extends AppBaseController
{
    /** @var  CellMemberMappingRepository */
    private $cellMemberMappingRepository;

    public function __construct(CellMemberMappingRepository $cellMemberMappingRepo)
    {
        $this->cellMemberMappingRepository = $cellMemberMappingRepo;
    }

    /**
     * Display a listing of the CellMemberMapping.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->cellMemberMappingRepository->pushCriteria(new RequestCriteria($request));
        $cellMemberMappings = $this->cellMemberMappingRepository->all();

        return view('cell_member_mappings.index')
            ->with('cellMemberMappings', $cellMemberMappings);
    }

    /**
     * Show the form for creating a new CellMemberMapping.
     *
     * @return Response
     */
    public function create()
    {
        return view('cell_member_mappings.create');
    }

    /**
     * Store a newly created CellMemberMapping in storage.
     *
     * @param CreateCellMemberMappingRequest $request
     *
     * @return Response
     */
    public function store(CreateCellMemberMappingRequest $request)
    {
        $input = $request->all();

        $cellMemberMapping = $this->cellMemberMappingRepository->create($input);

        Flash::success('Cell Member Mapping saved successfully.');

        return redirect(route('cellMemberMappings.index'));
    }

    /**
     * Display the specified CellMemberMapping.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cellMemberMapping = $this->cellMemberMappingRepository->findWithoutFail($id);

        if (empty($cellMemberMapping)) {
            Flash::error('Cell Member Mapping not found');

            return redirect(route('cellMemberMappings.index'));
        }

        return view('cell_member_mappings.show')->with('cellMemberMapping', $cellMemberMapping);
    }

    /**
     * Show the form for editing the specified CellMemberMapping.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cellMemberMapping = $this->cellMemberMappingRepository->findWithoutFail($id);

        if (empty($cellMemberMapping)) {
            Flash::error('Cell Member Mapping not found');

            return redirect(route('cellMemberMappings.index'));
        }

        return view('cell_member_mappings.edit')->with('cellMemberMapping', $cellMemberMapping);
    }

    /**
     * Update the specified CellMemberMapping in storage.
     *
     * @param  int              $id
     * @param UpdateCellMemberMappingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCellMemberMappingRequest $request)
    {
        $cellMemberMapping = $this->cellMemberMappingRepository->findWithoutFail($id);

        if (empty($cellMemberMapping)) {
            Flash::error('Cell Member Mapping not found');

            return redirect(route('cellMemberMappings.index'));
        }

        $cellMemberMapping = $this->cellMemberMappingRepository->update($request->all(), $id);

        Flash::success('Cell Member Mapping updated successfully.');

        return redirect(route('cellMemberMappings.index'));
    }

    /**
     * Remove the specified CellMemberMapping from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cellMemberMapping = $this->cellMemberMappingRepository->findWithoutFail($id);

        if (empty($cellMemberMapping)) {
            Flash::error('Cell Member Mapping not found');

            return redirect(route('cellMemberMappings.index'));
        }

        $this->cellMemberMappingRepository->delete($id);

        Flash::success('Cell Member Mapping deleted successfully.');

        return redirect(route('cellMemberMappings.index'));
    }
}
