<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \App\Http\Middleware\TrustProxies::class,
        \Fruitcake\Cors\HandleCors::class,
        \App\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:60,1',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,

///////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // middleware for creator to edit
        // 'userChangePasswd' => \App\Http\Middleware\Profile\RedirectIfNotUserPassword::class,
        'isOwner' => \App\Http\Middleware\Profile\RedirectIfNotUserProfile::class,
        'isGM' => \App\Http\Middleware\Roles\RedirectIfNotUserGM::class,
        'isGoldM' => \App\Http\Middleware\Roles\RedirectIfNotUserGoldM::class,
        'isSM' => \App\Http\Middleware\Roles\RedirectIfNotUserSM::class,
        'isBM' => \App\Http\Middleware\Roles\RedirectIfNotUserBM::class,
        'isNM' => \App\Http\Middleware\Roles\RedirectIfNotUserNM::class,

///////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // middleware for forum
        'ownPost' => \App\Http\Middleware\Forum\RedirectIfNotUserPost::class,
        'ownComment' => \App\Http\Middleware\Forum\RedirectIfNotUserComment::class,

///////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // middleware for offline town portal
        'ownOTP' => \App\Http\Middleware\Normal\RedirectIfNotUserOTP::class,
        // middleware for acquire super shue
        'ownASShue' => \App\Http\Middleware\Normal\RedirectIfNotUserASS::class,
        // middleware for buy all skill
        'ownBASkill' => \App\Http\Middleware\Normal\RedirectIfNotUserBAS::class,
        // middleware for equip super super shue
        'ownESSS' => \App\Http\Middleware\Normal\RedirectIfNotUserESSS::class,
        // middleware for buy lore
        'ownBLore' => \App\Http\Middleware\Normal\RedirectIfNotUserBlore::class,
        // middleware for hero rebirth
        'ownHRebirth' => \App\Http\Middleware\Normal\RedirectIfNotUserHRebirth::class,
        // middleware for hero reset rebirth
        'ownHRRebirth' => \App\Http\Middleware\Normal\RedirectIfNotUserHRRebirth::class,
        // middleware for mercenary rebirth
        'ownMRebirth' => \App\Http\Middleware\Normal\RedirectIfNotUserMRebirth::class,
        // middleware for mercenary reset rebirth
        'ownMRRebirth' => \App\Http\Middleware\Normal\RedirectIfNotUserMRRebirth::class,
        // middleware for hero edit points
        'ownHPoints' => \App\Http\Middleware\Normal\RedirectIfNotUserHPoints::class,
        // middleware for mercenary edit points
        'ownMPoints' => \App\Http\Middleware\Normal\RedirectIfNotUserMPoints::class,

///////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // vip salary
        'ownSalary' => \App\Http\Middleware\Vip\RedirectIfNotUserSalary::class,

///////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // GM section
        'ownByGM' => \App\Http\Middleware\GM\RedirectIfNotGM::class,

///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ];
}
