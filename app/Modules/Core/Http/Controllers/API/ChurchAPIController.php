<?php

namespace App\Modules\Core\Http\Controllers\API;

//requet
use App\Modules\Core\Http\Requests\API\CreateChurchAPIRequest;
use App\Modules\Core\Http\Requests\API\UpdateChurchAPIRequest;
use Illuminate\Http\Request;
use App\Modules\Core\Http\Requests\RegisterChurchAPIRequest;

//models
use App\Modules\Core\Models\Church;
use App\Modules\Core\Models\OperationMode;
use App\Modules\Core\Models\MasterBranch;
use App\Modules\Core\Models\Branch;
use App\Modules\Membership\Models\MemberDetail;
use App\Modules\Admin\Models\Administrator;
use App\Modules\Admin\Models\AdminBranch as AssignBranch;
use App\Modules\Core\Models\AdminBranch;

use App\Modules\Admin\Models\ChurchAdmin;
use App\Modules\Admin\Models\AdminStatus;
use App\Models\ModelStatus;
use App\Modules\Admin\Models\AdminType;

//Repos
use App\Modules\Core\Repositories\ChurchRepository;

//controllers
use App\Http\Controllers\AppBaseController;

//resources
use App\Modules\Core\Http\Resources\ChurchResource;

use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Modules\Admin\Models\BranchAdmin;



/**
 * Class ChurchController
 * @package App\Modules\Core\Http\Controllers\API
 * @group Core
 */

class ChurchAPIController extends AppBaseController
{
    /** @var  ChurchRepository */
    private $churchRepository;

    public function __construct(ChurchRepository $churchRepo)
    {
        $this->churchRepository = $churchRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/churches",
     *      summary="Get a listing of the Churches.",
     *      tags={"Church"},
     *      description="Get all Churches",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Church")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        // $this->churchRepository->pushCriteria(new RequestCriteria($request));
        // $this->churchRepository->pushCriteria(new LimitOffsetCriteria($request));
        // $churches = $this->churchRepository->all();

        // return $this->sendResponse($churches->toArray(), 'Churches retrieved successfully');

        return $this->sendResponse(  ChurchResource::collection( Church::all() ), 'all church resources' );
    }

    /**
     * @param CreateChurchAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/churches",
     *      summary="Store a newly created Church in storage",
     *      tags={"Church"},
     *      description="Store Church",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Church that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Church")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Church"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateChurchAPIRequest $request)
    {
        $church = Church::create( $request->all() );

        if( $church ) {
            return $this->sendResponse( new ChurchResource( Church::find($church->id) ), 'church created successfully' );
        }

        return $this->sendError('Error creating new church', 302);
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/churches/{id}",
     *      summary="Display the specified Church",
     *      tags={"Church"},
     *      description="Get Church",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Church",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Church"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        $church = $this->churchRepository->findWithoutFail($id);

        if (empty($church)) {
            return $this->sendError('Church not found');
        }

        return $this->sendResponse( new ChurchResource( $church ), 'church Details retrieved successfully' );
    }

    /**
     * @param int $id
     * @param UpdateChurchAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/churches/{id}",
     *      summary="Update the specified Church in storage",
     *      tags={"Church"},
     *      description="Update Church",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Church",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Church that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Church")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Church"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateChurchAPIRequest $request)
    {
        $input = $request->all();

        /** @var Church $church */
        $church = $this->churchRepository->findWithoutFail($id);

        if (empty($church)) {
            return $this->sendError('Church not found');
        }

        $church = $this->churchRepository->update($input, $id);

        return $this->sendResponse($church->toArray(), 'Church updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/churches/{id}",
     *      summary="Remove the specified Church from storage",
     *      tags={"Church"},
     *      description="Delete Church",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Church",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var Church $church */
        $church = $this->churchRepository->findWithoutFail($id);

        if (empty($church)) {
            return $this->sendError('Church not found');
        }

        $church->delete();

        return $this->sendResponse($id, 'Church deleted successfully');
    }



    /*
     * API to register a new church
     * This registers thge chucrch, creates the master branch for the church, creates a church-level admin for the church and registers the admin as a member of the church
     *
     * @bodyParam church_name string required The name of the church
     * @bodyParam firstname string required The user's lastname
     * @bodyParam surname string required The user's lastname
     * @bodyParam email string required The email of the admin signing up the church
     * @bodyParam telephone string required The telephone number of the admin signing up the church
     * @bodyParam password string required The user's password
     * @bodyParam c_password string required The user's password again (should be the same as password)
     */
    public function registerChurch( RegisterChurchAPIRequest $request)
    {
        $church = new Church([

            'name' => $request->church_name,
            'mode' => OperationMode::LIVE,
            'activation_key' => Church::generateAppKey(),
            'created_by_email' => $request->email,
            'created_by_telephone' => $request->telephone,
            'status' => ModelStatus::ACTIVE,
        ]);

        try{

            DB::beginTransaction();

            $church->save();

            $details = [
                'firstname' => $request->firstname,
                'surname' => $request->surname,
                'email' => $request->email,
                'telephone' => $request->telephone,
            ];

            $admin = new ChurchAdmin( $details + ['username' => $request->username,
                                                    //'member_id' => $member->id,
                                                    'church_id' => $church->id,
                                                    'status' => AdminStatus::ACTIVE,
                                                    'password' => Hash::make($request->password),
                                                    'created_by' => AdminType::SuperAdmin, ]);

            $admin->save();

            $branch = new MasterBranch(['name' => $church->name, 'church_id' => $church->id, 'status' => ModelStatus::ACTIVE, 'created_by' => $admin->id]);
            $branch->save();



            $member = new MemberDetail( $details + ['branch_id' => $branch->id, 'member_type_id' => 1, 'created_by' => $admin->id ]);
            $member->save();

            DB::commit();

            //send verify email to client
            $admin->sendEmailVerificationNotification();
            return $this->sendResponse($church, "church has been registered succesfully. Kindly check your email for instructions to proceed");
        }
        catch( \Exception $e)
        {
            DB::rollBack();
            return $this->sendError("unable to  process this request at the moment.");
        }
    }



    /**
     * Gets the member types for a church
     */
    public function churchMemberTypes()
    {
        $church =  Auth::user()->getChurch ;
        $memberTypes = $church->getMemberTypes;
        return $this->sendResponse($memberTypes, 'member types retrieved succefully');
    }

    public function test(Request $request)
    {
       // $branch = new MasterBranch(['name' => 'no name', 'church_id' => 1 ]);
        //['name' => 'no name', 'church_id' => 1 ]
       // $branch->name = "no name";
       // $branch->save();

      // $church = Church::find(2)->getMemberTypes;

      //$branch = Branch::find(1);

      // $link = Route::getFacadeRoot()->current()->uri();

       // $result =  Auth::user()->getChurch;
        $uri = $request->path();

        $church = Church::find(15);
        $isCorrect = true;
       echo json_encode(['activation_key' => $church->masterAdmin ]);
    }

}
