<?php

namespace App\Http\Middleware\Roles;

use Closure;

class RedirectIfNotUserGoldM
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
		// dd($request->route()->account->c_id);
		if ( !$request->user()->onlyGoldM(2) ) {
			return redirect()->back();
		}
		return $next($request);
	}
}
