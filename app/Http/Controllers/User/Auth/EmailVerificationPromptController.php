<?php

namespace App\Http\Controllers\AbstractAuth\Auth;

use App\Http\Controllers\AbstractAuth\Contracts\GuardInterface;
use App\Http\Controllers\AbstractAuth\Contracts\RouteNamePrefixInterface;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

abstract class EmailVerificationPromptController extends Controller implements
GuardInterface,
RouteNamePrefixInterface
{
    /**
     * Display the email verification prompt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        return $request->user($this->getGuard())->hasVerifiedEmail()
                    ? redirect()->route($this->getRouteNamePrefix() . 'dashboard')
                    : view('user.auth.verify-email');
    }
}
