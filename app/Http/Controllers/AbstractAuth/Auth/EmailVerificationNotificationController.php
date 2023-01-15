<?php

namespace App\Http\Controllers\AbstractAuth\Auth;

use App\Http\Controllers\AbstractAuth\Contracts\GuardInterface;
use App\Http\Controllers\AbstractAuth\Contracts\RouteNamePrefixInterface;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

abstract class EmailVerificationNotificationController extends Controller implements
GuardInterface,
RouteNamePrefixInterface
{
    /**
     * Send a new email verification notification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if ($request->user($this->getGuard())->hasVerifiedEmail()) {
            return redirect()->route($this->getRouteNamePrefix() . 'dashboard');
        }

        $request->user($this->getGuard())->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
