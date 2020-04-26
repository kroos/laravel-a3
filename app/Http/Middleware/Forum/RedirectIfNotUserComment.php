<?php

namespace App\Http\Middleware\Forum;

use Closure;

class RedirectIfNotUserComment
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
		if ( !$request->user()->commentOwner( $request->route()->postComment->author ) ) {
			return redirect()->back();
		}
		return $next($request);
	}
}
