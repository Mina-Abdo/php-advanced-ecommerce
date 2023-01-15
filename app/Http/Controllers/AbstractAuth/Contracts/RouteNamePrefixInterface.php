<?php
namespace App\Http\Controllers\AbstractAuth\Contracts;

interface RouteNamePrefixInterface
{
    /**
     * getRouteNamePrefix
     *
     * @return string
     */
    public function getRouteNamePrefix() :string;

    /**
     * setRouteNamePrefix
     *
     * @param  string $ruteNamePrefix
     * @return void
     */
    public function setRouteNamePrefix($ruteNamePrefix);
}
