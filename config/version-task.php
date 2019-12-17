<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Version Provider
    |--------------------------------------------------------------------------
    |
    | This option controls the provider that will be used to determine the
    | current application version.
    |
    | Supported: "file", "database", "git"
    |
    */
    'provider' => 'file',

    /*
    |--------------------------------------------------------------------------
    | Log Tasks
    |--------------------------------------------------------------------------
    |
    | This option determines if run tasks are logged to the database or not.
    | The database table will need to have been created in order for this to
    | run otherwise an error will be thrown.
    |
    */
    'log_to_database' => false,
];
