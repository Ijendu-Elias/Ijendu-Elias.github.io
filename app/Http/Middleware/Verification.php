<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Verification
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
        if(Session::get('customer_email')){
            $user = DB::table('tbl_customers_registered')
                                    ->where('customer_email', Session::get('customer_email'))
                                    ->first();

            if($user->email_verified_at){
                return $next($request);
            } else {
                return redirect()->route('email-verify-resend');
            }    
        }else {
            return redirect()->route('home');
        }
    }
}
