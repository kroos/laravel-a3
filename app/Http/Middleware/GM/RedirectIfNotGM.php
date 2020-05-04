<?php

namespace App\Http\Middleware\GM;

use Closure;

class RedirectIfNotGM
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
		if (!$request->user()->onlyGM(1)) {
			return redirect()->back();
		}
		return $next($request);
	}
}
