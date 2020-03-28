<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    protected function validateEmail(Request $request)
    {
        $request->validate([
            'c_headerb' => 'required|email|exists:Account,c_headerb,c_status,A',                                          // rules
        ], [
            'c_headerb.exists' => 'The selected account is invalid or the account has been disabled or banned.'      // messages
        ], [
            'c_headerb' => 'E-Mail Address'                                                                          // attributes
        ]);
    }

    protected function credentials(Request $request)
    {
        return $request->only('c_headerb');
    }

    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        if ($request->wantsJson()) {
            throw ValidationException::withMessages([
                'c_headerb' => [trans($response)],
            ]);
        }

        return back()
                ->withInput($request->only('c_headerb'))
                ->withErrors(['c_headerb' => trans($response)]);
    }

}
