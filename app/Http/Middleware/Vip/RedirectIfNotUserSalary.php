<?php

namespace App\Http\Middleware\Vip;

use Closure;

class RedirectIfNotUserSalary
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
		// dd($request->user()->onlyGM(1));
		if (!$request->user()->onlyProfileOwner($request->route()->salary->c_id) || $request->user()->onlyNM(5)) {
			return redirect()->back();
		}
		return $next($request);
	}
}
