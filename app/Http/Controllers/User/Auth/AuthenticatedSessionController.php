<?php

namespace App\Http\Controllers\User\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Controllers\AbstractAuth\Contracts\GuardInterface;
use App\Http\Controllers\AbstractAuth\Contracts\ViewPrefixInterface;
use App\Http\Controllers\AbstractAuth\Contracts\RouteNamePrefixInterface;
use App\Http\Controllers\AbstractAuth\Auth\AuthenticatedSessionController as AbstractAuthenticatedSessionController;

class AuthenticatedSessionController extends AbstractAuthenticatedSessionController
{
    /**
     * guard
     *
     * @var string
     */
    public $guard = 'web';
    /**
     * routNamePrefix
     *
     * @var string
     */
    public $routNamePrefix = 'users.';
    /**
     * viewPrefix
     *
     * @var string
     */
    public $viewPrefix = 'user.';

    /**
     * Get guard
     *
     * @return  string
     */
    public function getGuard() :string
    {
        return $this->guard;
    }

    /**
     * Set guard
     *
     * @param  string  $guard  guard
     *
     * @return  self
     */
    public function setGuard(string $guard)
    {
        $this->guard = $guard;

        return $this;
    }
}
