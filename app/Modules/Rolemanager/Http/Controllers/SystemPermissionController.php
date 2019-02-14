<?php

namespace App\Modules\rolemanager\Http\Controllers;

use App\Modules\rolemanager\Http\Requests\CreateSystemPermissionRequest;
use App\Modules\rolemanager\Http\Requests\UpdateSystemPermissionRequest;
use App\Modules\rolemanager\Repositories\SystemPermissionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SystemPermissionController extends AppBaseController
{
    /** @var  SystemPermissionRepository */
    private $systemPermissionRepository;

    public function __construct(SystemPermissionRepository $systemPermissionRepo)
    {
        $this->systemPermissionRepository = $systemPermissionRepo;
    }

    /**
     * Display a listing of the SystemPermission.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->systemPermissionRepository->pushCriteria(new RequestCriteria($request));
        $systemPermissions = $this->systemPermissionRepository->all();

        return view('system_permissions.index')
            ->with('systemPermissions', $systemPermissions);
    }

    /**
     * Show the form for creating a new SystemPermission.
     *
     * @return Response
     */
    public function create()
    {
        return view('system_permissions.create');
    }

    /**
     * Store a newly created SystemPermission in storage.
     *
     * @param CreateSystemPermissionRequest $request
     *
     * @return Response
     */
    public function store(CreateSystemPermissionRequest $request)
    {
        $input = $request->all();

        $systemPermission = $this->systemPermissionRepository->create($input);

        Flash::success('System Permission saved successfully.');

        return redirect(route('systemPermissions.index'));
    }

    /**
     * Display the specified SystemPermission.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $systemPermission = $this->systemPermissionRepository->findWithoutFail($id);

        if (empty($systemPermission)) {
            Flash::error('System Permission not found');

            return redirect(route('systemPermissions.index'));
        }

        return view('system_permissions.show')->with('systemPermission', $systemPermission);
    }

    /**
     * Show the form for editing the specified SystemPermission.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $systemPermission = $this->systemPermissionRepository->findWithoutFail($id);

        if (empty($systemPermission)) {
            Flash::error('System Permission not found');

            return redirect(route('systemPermissions.index'));
        }

        return view('system_permissions.edit')->with('systemPermission', $systemPermission);
    }

    /**
     * Update the specified SystemPermission in storage.
     *
     * @param  int              $id
     * @param UpdateSystemPermissionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSystemPermissionRequest $request)
    {
        $systemPermission = $this->systemPermissionRepository->findWithoutFail($id);

        if (empty($systemPermission)) {
            Flash::error('System Permission not found');

            return redirect(route('systemPermissions.index'));
        }

        $systemPermission = $this->systemPermissionRepository->update($request->all(), $id);

        Flash::success('System Permission updated successfully.');

        return redirect(route('systemPermissions.index'));
    }

    /**
     * Remove the specified SystemPermission from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $systemPermission = $this->systemPermissionRepository->findWithoutFail($id);

        if (empty($systemPermission)) {
            Flash::error('System Permission not found');

            return redirect(route('systemPermissions.index'));
        }

        $this->systemPermissionRepository->delete($id);

        Flash::success('System Permission deleted successfully.');

        return redirect(route('systemPermissions.index'));
    }
}
