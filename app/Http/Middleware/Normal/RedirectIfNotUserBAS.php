<?php

namespace App\Http\Middleware\Normal;

use Closure;

class RedirectIfNotUserBAS
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
		// dd($request->route()->offline_town_portal);
		if ( !$request->user()->onlyProfileOwner( $request->route()->buy_all_skill->c_id ) ) {
			return redirect()->back();
		}
		return $next($request);
	}
}
