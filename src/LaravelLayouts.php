<?php

namespace Piyush\LaravelLayouts;

class LaravelLayouts {
    
    /**
    * Indicates if REST auth's migrations will be run.
    *
    * @var bool
    */
    public static $runsMigrations = true;

    /**
     * The admin model class name.
     *
     * @var string
     */
    public static $adminModel;

    public static function shouldRunMigrations()
    {
        return static::$runsMigrations;
    }

    public static function ignoreMigrations()
    {
        static::$runsMigrations = false;

        return new static;
    }

    public static function useAdminModel($model)
    {
        static::$adminModel = $model;
    }

    const LOGIN_REGISTER_LOGOUT = 'LOGIN_REGISTER_LOGOUT';
    const FORGOT_PASSWORD = 'FORGOT_PASSWORD';

    public static function isWhiteListedRoute($identifier)
    {
        return !in_array($identifier, config('laravel-layouts.except_web_routes'));
    }
}