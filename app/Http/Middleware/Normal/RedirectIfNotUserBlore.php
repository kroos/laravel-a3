<?php

namespace App\Http\Middleware\Normal;

use Closure;

class RedirectIfNotUserBlore
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
		if ( !$request->user()->onlyProfileOwner( $request->route()->buy_lore->c_id ) ) {
			return redirect()->back();
		}
		return $next($request);
	}
}
