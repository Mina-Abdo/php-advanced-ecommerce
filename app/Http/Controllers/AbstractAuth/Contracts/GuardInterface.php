<?php
namespace App\Http\Controllers\AbstractAuth\Contracts;

interface GuardInterface
{
    /**
     * getGuard
     *
     * @return string
     */
    public function getGuard() :string;

    /**
     * setGuard
     *
     * @param  string $guard
     * @return void
     */
    public function setGuard($guard);
}
