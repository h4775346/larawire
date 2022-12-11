<?php

if (!function_exists('class_route')) {
    /**
     * @param string $route_name
     * @param string $class
     * @return string
     */
    function class_route(string $route_name, string $class): string
    {
        return request()->routeIs($route_name) ? $class : "";
    }
}

if (!function_exists('can')) {
    /**
     * @param string $permission
     * @return string
     */
    function can(string $permission): string
    {
        $user = auth()->user();
        if (!$user)
            return false;
        return $user->can($permission);
    }
}

if (!function_exists('can_or_abort')) {
    /**
     * @param string $permission
     */
    function can_or_abort(string $permission): void
    {
        $user = auth()->user();
        if (!$user)
            abort(403);
        if (!can($permission))
            abort(403);
    }
}

