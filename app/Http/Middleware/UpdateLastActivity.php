<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class UpdateLastActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    //code to update customer last current login activities
    public function handle($request, Closure $next)
    {
        if(Session::get('customer_email')){
            $user = DB::table('tbl_customers_registered')
                                    ->where('customer_email', Session::get('customer_email'))
                                    ->first();

            if($user){
                $user = DB::table('tbl_customers_registered')
                                    ->where('customer_email', Session::get('customer_email'))
                                    ->update([
                                        'last_activities' => now()
                                    ]);
            }  
        } 
        
        return $next($request);
    }
}
