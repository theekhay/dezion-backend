<?php

namespace App\Http\Controllers\API;

use App\Models\User;

use App\Http\Requests\registerUserRequest;
use Validator;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



class UserController extends Controller
{
    public $successStatus = 200;



    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')]))
        {
            $user = Auth::user();

            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            return response()->json(['success' => $success], $this-> successStatus);
        }
        else
        {
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }



    /**
    * Register api
    *
    * @return \Illuminate\Http\Response
    */

    public function register(registerUserRequest $request)
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')-> accessToken;
        $success['name'] =  $user->name;

        return response()->json(['success' => $success], $this->successStatus);
    }


    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this-> successStatus);
    }
}
