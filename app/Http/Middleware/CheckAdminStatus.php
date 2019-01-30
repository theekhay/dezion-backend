<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Modules\Admin\Models\AdminStatus;



class CheckAdminStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response =   $next($request);

        $admin = Auth::user();

        /**
         * Administrators have multiple states.
         * This makes sure the admin is active at the point of login
         * If the admin is not active, an error is thrown with an appropriately defined error message
         */

        if( ! empty($admin) ){

            if( $admin->status != AdminStatus::ACTIVE ){

                $message = isset( AdminStatus::$statusMessage[$admin->status ] ) ? AdminStatus::$statusMessage[$admin->status ] : "unable to authorize this login." ;
                return response()->json(['error' =>  $message], 401);
            }
        }


        return $response;
    }
}
