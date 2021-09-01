<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;
use App\Notifications\VerifyEmail;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{

    /**
     * Show the email verification notice.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show()
    {
        !is_null(Auth::guard('customer')->user()->email_verified_at);

        return view('frontend.checkout.verify_email');
    }

    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function verify(Request $request)
    {
        if (!hash_equals((string) $request->route('id'), (string) Auth::guard('customer')->user()->getKey())) {
            throw new AuthorizationException;
        }

        if (!hash_equals((string) $request->route('hash'), sha1(Auth::guard('customer')->user()->email))) {
            throw new AuthorizationException;
        }

        if (!is_null(Auth::guard('customer')->user()->email_verified_at)) {
            return $request->wantsJson()
                ? new JsonResponse([], 204)
                : redirect('/show-checkout');
        }

        if (Auth::guard('customer')->user()->forceFill(['email_verified_at' => Auth::guard('customer')->user()->freshTimestamp(),])->save()) {
            event(new Verified(Auth::guard('customer')->user()));
        }

        if ($response = $this->verified($request)) {
            return $response;
        }
        // if (app()->getLocale() == 'en') {
        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/show-checkout')->with('success-verify', 'Verified success');
        // }
    }

    /**
     * The user has been verified.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    protected function verified(Request $request)
    {
        //
        // return redirect('/show-checkout')->with('success-verify', 'ok');
    }

    /**
     * Resend the email verification notification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function resend(Request $request)
    {
        if (!is_null(Auth::guard('customer')->user()->email_verified_at)) {
            return $request->wantsJson()
                ? new JsonResponse([], 204)
                : redirect('/show-checkout');
        }
        Auth::guard('customer')->user()->notify(new VerifyEmail);

        return $request->wantsJson()
            ? new JsonResponse([], 202)
            : back()->with('resent', true);
    }
}
