<?php

namespace App\Http\Middleware\Profile;

use Closure;

class RedirectIfNotUserProfile
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
		if ( !$request->user()->onlyProfileOwner( $request->route()->account->c_id ) ) {
			return redirect()->back();
		}
		return $next($request);
	}
}
