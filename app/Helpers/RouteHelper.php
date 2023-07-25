<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('hasRoutePrefix')) {
    function hasRoutePrefix($prefix)
    {
        $currentRoute = explode('/', request()->route()->uri());
        return $currentRoute[0] === $prefix;
    }
}

if (!function_exists('hasPermissionMenu')) {
    function hasPermissionMenu($permission)
    {
        $hak_akses = Auth::user()->role;
        return in_array($hak_akses, $permission);
    }
}
