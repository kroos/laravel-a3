<?php

namespace App\Http\Middleware\Forum;

use Closure;

class RedirectIfNotUserPost
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
		// dd($request->route()->post->author);
		if ( !$request->user()->postOwner( $request->route()->post->author ) ) {
			return redirect()->back();
		}
		return $next($request);
	}
}
