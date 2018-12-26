<?php

namespace App\Modules\Membership\Http\Controllers;

use App\Modules\Membership\Http\Requests\CreateMemberDetailRequest;
use App\Modules\Membership\Http\Requests\UpdateMemberDetailRequest;
use App\Modules\Membership\Repositories\MemberDetailRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class MemberDetailController extends AppBaseController
{
    /** @var  MemberDetailRepository */
    private $memberDetailRepository;

    public function __construct(MemberDetailRepository $memberDetailRepo)
    {
        $this->memberDetailRepository = $memberDetailRepo;
    }

    /**
     * Display a listing of the MemberDetail.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->memberDetailRepository->pushCriteria(new RequestCriteria($request));
        $memberDetails = $this->memberDetailRepository->all();

        return view('member_details.index')
            ->with('memberDetails', $memberDetails);
    }

    /**
     * Show the form for creating a new MemberDetail.
     *
     * @return Response
     */
    public function create()
    {
        return view('member_details.create');
    }

    /**
     * Store a newly created MemberDetail in storage.
     *
     * @param CreateMemberDetailRequest $request
     *
     * @return Response
     */
    public function store(CreateMemberDetailRequest $request)
    {
        $input = $request->all();

        $memberDetail = $this->memberDetailRepository->create($input);

        Flash::success('Member Detail saved successfully.');

        return redirect(route('memberDetails.index'));
    }

    /**
     * Display the specified MemberDetail.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $memberDetail = $this->memberDetailRepository->findWithoutFail($id);

        if (empty($memberDetail)) {
            Flash::error('Member Detail not found');

            return redirect(route('memberDetails.index'));
        }

        return view('member_details.show')->with('memberDetail', $memberDetail);
    }

    /**
     * Show the form for editing the specified MemberDetail.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $memberDetail = $this->memberDetailRepository->findWithoutFail($id);

        if (empty($memberDetail)) {
            Flash::error('Member Detail not found');

            return redirect(route('memberDetails.index'));
        }

        return view('member_details.edit')->with('memberDetail', $memberDetail);
    }

    /**
     * Update the specified MemberDetail in storage.
     *
     * @param  int              $id
     * @param UpdateMemberDetailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMemberDetailRequest $request)
    {
        $memberDetail = $this->memberDetailRepository->findWithoutFail($id);

        if (empty($memberDetail)) {
            Flash::error('Member Detail not found');

            return redirect(route('memberDetails.index'));
        }

        $memberDetail = $this->memberDetailRepository->update($request->all(), $id);

        Flash::success('Member Detail updated successfully.');

        return redirect(route('memberDetails.index'));
    }

    /**
     * Remove the specified MemberDetail from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $memberDetail = $this->memberDetailRepository->findWithoutFail($id);

        if (empty($memberDetail)) {
            Flash::error('Member Detail not found');

            return redirect(route('memberDetails.index'));
        }

        $this->memberDetailRepository->delete($id);

        Flash::success('Member Detail deleted successfully.');

        return redirect(route('memberDetails.index'));
    }
}
