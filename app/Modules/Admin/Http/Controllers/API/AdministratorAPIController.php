<?php

namespace App\Modules\Admin\Http\Controllers\API;

//requests
use App\Modules\Admin\Http\Requests\API\CreateAdministratorAPIRequest;
use App\Modules\Admin\Http\Requests\API\UpdateAdministratorAPIRequest;
use Illuminate\Http\Request;

//models
use App\Modules\Admin\Models\Administrator;
use App\Modules\Core\Models\Church;
use App\Modules\Admin\Models\ChurchAdmin;
use App\Modules\Admin\Models\BranchAdmin;

use App\Modules\Admin\Models\AdminStatus;

//repo
use App\Modules\Admin\Repositories\AdministratorRepository;

//controllers
use App\Http\Controllers\AppBaseController;

//resources
use App\Modules\Admin\Http\Resources\AdminResource;


use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

use App\Modules\Admin\Http\Requests\API\AdminSignUpRequest;

//use Illuminate\Support\Facades\Mail;


/**
 * Class AdministratorController
 * @package App\Modules\Admin\Http\Controllers\API
 * @group Administrator
 */

class AdministratorAPIController extends AppBaseController
{
    //use Notifiable, HasApiTokens;

    /** @var  AdministratorRepository */
    private $administratorRepository;

    public function __construct(AdministratorRepository $administratorRepo)
    {
        $this->administratorRepository = $administratorRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/administrators",
     *      summary="Get a listing of the Administrators.",
     *      tags={"Administrator"},
     *      description="Get all Administrators",
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
     *                  @SWG\Items(ref="#/definitions/Administrator")
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
        $this->administratorRepository->pushCriteria(new RequestCriteria($request));
        $this->administratorRepository->pushCriteria(new LimitOffsetCriteria($request));
        $administrators = $this->administratorRepository->all();

        return $this->sendResponse($administrators->toArray(), 'Administrators retrieved successfully');
    }

    /**
     * @param CreateAdministratorAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/administrators",
     *      summary="Store a newly created Administrator in storage",
     *      tags={"Administrator"},
     *      description="Store Administrator",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Administrator that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Administrator")
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
     *                  ref="#/definitions/Administrator"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateAdministratorAPIRequest $request)
    {
        $input = $request->all();

        $administrators = $this->administratorRepository->create($input);

        return $this->sendResponse($administrators->toArray(), 'Administrator saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/administrators/{id}",
     *      summary="Display the specified Administrator",
     *      tags={"Administrator"},
     *      description="Get Administrator",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Administrator",
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
     *                  ref="#/definitions/Administrator"
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
        /** @var Administrator $administrator */
        $administrator = $this->administratorRepository->findWithoutFail($id);

        if (empty($administrator)) {
            return $this->sendError('Administrator not found');
        }

        return $this->sendResponse($administrator->toArray(), 'Administrator retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateAdministratorAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/administrators/{id}",
     *      summary="Update the specified Administrator in storage",
     *      tags={"Administrator"},
     *      description="Update Administrator",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Administrator",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Administrator that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Administrator")
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
     *                  ref="#/definitions/Administrator"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateAdministratorAPIRequest $request)
    {
        $input = $request->all();

        /** @var Administrator $administrator */
        $administrator = $this->administratorRepository->findWithoutFail($id);

        if (empty($administrator)) {
            return $this->sendError('Administrator not found');
        }

        $administrator = $this->administratorRepository->update($input, $id);

        return $this->sendResponse($administrator->toArray(), 'Administrator updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/administrators/{id}",
     *      summary="Remove the specified Administrator from storage",
     *      tags={"Administrator"},
     *      description="Delete Administrator",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Administrator",
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
        /** @var Administrator $administrator */
        $administrator = $this->administratorRepository->findWithoutFail($id);

        if (empty($administrator)) {
            return $this->sendError('Administrator not found');
        }

        $administrator->delete();

        return $this->sendResponse($id, 'Administrator deleted successfully');
    }


    public function login( $church_key = null )
    {

        if( Auth::attempt( ['email' => request('email'), 'password' => request('password') ] ) )
        {
            $admin = Auth::user();

            //tokens should be created using the church's appkey
            $success['token'] =  $admin->createToken('MyApp')->accessToken;
            $response = ['success' => $success, 'admin' => new AdminResource($admin) ] ;
            return $this->sendResponse($response, 'Login succesful');
        }
        else
        {
            return response()->json(['error'=>'Invalid username/password combination'], 401);
        }
    }



    /**
     * API to log currently authenticated user out the current device.
     *
     */
    public function logout()
    {
        $admin = Auth::user();
        $token = $admin->token();
        $token->revoke();
        return $this->sendResponse( $admin, 'log out successful');
    }



    /**
     * API to log currently authenticated user out of all devices they are signed in to.
     * This is especially needed in the case of password recovery.
     * After a successful password recovery, the user is supposed to be signed out of all
     * the devices he is logged in to.
     */
    public function logoutAllDevices()
    {
        DB::table('oauth_access_tokens')
        ->where('user_id', Auth::user()->id)
        ->update([
            'revoked' => true
        ]);
    }



    /**
     * API for creating a new branch administrator
     * @authenticated
     *
     * @bodyParam firstname string required The admin's lastname
     * @bodyParam surname string required The admin's lastname
     * @bodyParam email string required The email of the admin
     * @bodyParam telephone string required The telephone number of the admin
     * @bodyParam password string required The admin's password
     * @bodyParam username string  nullable The admin's username (has to be unique)
     * @bodyParam church_id string  required The id of the church the admin is being registered to
     * @bodyParam memeber_id integer nullable The member id of the admin
     * @return AdminResource
     *
     */
    public function makeBranchAdmin( CreateAdministratorAPIRequest $request ){

        $input = $request->all();
        $input['password'] = Hash::make($request->password);
        $administrator = new BranchAdmin( $input);
        $administrator->save();

        //this should send the admin a verification link
        $administrator->sendEmailVerificationNotification();
        return $this->sendResponse( new AdminResource($administrator) , 'Administrator saved successfully');
    }



   /**
    * This creates administrator for a church without the need for authentication
    * This uses the church uuid to map the admin to a church
    * Retreives the chuch master administrator (also called church admin)
    *
    * @bodyParam firstname string required The user's lastname
    * @bodyParam surname string required The user's lastname
    * @bodyParam email string required The email of the admin signing up the church
    * @bodyParam telephone string required The telephone number of the admin signing up the church
    * @bodyParam password string required The user's password
    * @bodyParam c_password string required The user's password again (should be the same as password)
    * @bodyParam username string  The admin's username (has to be unique)
    * @return Response
    */
    public function branchAdminSignup( AdminSignUpRequest $request,  $church_key)
    {
        $church = Church::where('uuid', $church_key )->first();

        //check that the church key is valid
        if( empty($church)){
            return $this->sendError("This church doesn't exist. Please make sure the link is correct");
        }

        $church_admin = $church->masterAdmin;

       // echo json_encode($church_admin->id); return;

        if( empty($church_admin)){
            return $this->sendError("Church Administrator not found");
        }

        $input = $request->all();
        $input['password'] = Hash::make($request->password);
        $administrator = new BranchAdmin( $input);
        $administrator->status = AdminStatus::PENDING_APPROVAL;
        $administrator->church_id = $church->id;
        $administrator->created_by = $church_admin->id;
        $administrator->save();

        //this should send the admin a verification link
        $administrator->sendEmailVerificationNotification();
        return $this->sendResponse( new AdminResource($administrator) , 'Administrator saved successfully');

    }






    public function test()
    {
        $admin = ChurchAdmin::find(4);
        $resp = $admin->sendInApp("I am here for you");
        $unread = $admin->unread();
        echo \json_encode(['res' => $unread->get() ]);
    }
}
