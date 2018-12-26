<?php

namespace App\Modules\Membership\Http\Controllers;

use App\Modules\Membership\Http\Requests\CreateMemberTypeRequest;
use App\Modules\Membership\Http\Requests\UpdateMemberTypeRequest;
use App\Modules\Membership\Repositories\MemberTypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class MemberTypeController extends AppBaseController
{
    /** @var  MemberTypeRepository */
    private $memberTypeRepository;

    public function __construct(MemberTypeRepository $memberTypeRepo)
    {
        $this->memberTypeRepository = $memberTypeRepo;
    }

    /**
     * Display a listing of the MemberType.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->memberTypeRepository->pushCriteria(new RequestCriteria($request));
        $memberTypes = $this->memberTypeRepository->all();

        return view('member_types.index')
            ->with('memberTypes', $memberTypes);
    }

    /**
     * Show the form for creating a new MemberType.
     *
     * @return Response
     */
    public function create()
    {
        return view('member_types.create');
    }

    /**
     * Store a newly created MemberType in storage.
     *
     * @param CreateMemberTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateMemberTypeRequest $request)
    {
        $input = $request->all();

        $memberType = $this->memberTypeRepository->create($input);

        Flash::success('Member Type saved successfully.');

        return redirect(route('memberTypes.index'));
    }

    /**
     * Display the specified MemberType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $memberType = $this->memberTypeRepository->findWithoutFail($id);

        if (empty($memberType)) {
            Flash::error('Member Type not found');

            return redirect(route('memberTypes.index'));
        }

        return view('member_types.show')->with('memberType', $memberType);
    }

    /**
     * Show the form for editing the specified MemberType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $memberType = $this->memberTypeRepository->findWithoutFail($id);

        if (empty($memberType)) {
            Flash::error('Member Type not found');

            return redirect(route('memberTypes.index'));
        }

        return view('member_types.edit')->with('memberType', $memberType);
    }

    /**
     * Update the specified MemberType in storage.
     *
     * @param  int              $id
     * @param UpdateMemberTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMemberTypeRequest $request)
    {
        $memberType = $this->memberTypeRepository->findWithoutFail($id);

        if (empty($memberType)) {
            Flash::error('Member Type not found');

            return redirect(route('memberTypes.index'));
        }

        $memberType = $this->memberTypeRepository->update($request->all(), $id);

        Flash::success('Member Type updated successfully.');

        return redirect(route('memberTypes.index'));
    }

    /**
     * Remove the specified MemberType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $memberType = $this->memberTypeRepository->findWithoutFail($id);

        if (empty($memberType)) {
            Flash::error('Member Type not found');

            return redirect(route('memberTypes.index'));
        }

        $this->memberTypeRepository->delete($id);

        Flash::success('Member Type deleted successfully.');

        return redirect(route('memberTypes.index'));
    }
}
