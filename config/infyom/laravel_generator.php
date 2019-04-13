<?php

 /**
  * This sets the current module for the laravel-genrator
  * It's a hack to set the path where the files would be generated based on the module I want the files generated in
  * This ought to be from the commandkine, but I don't have such time luxury to tweak the package.
  * Disadvantage: This always has to be changesd whenever you want to scaffold  for a new module
  */
$module = "Modules/memberlocationmapping/";

/**
 * This creates the namespace from the files generatd in the above defined module.
 * This was needed because the files were getting wrongly namespaced
 */
$nspace =  str_replace('/', '\\', $module);

return [

    /*
    |--------------------------------------------------------------------------
    | Paths
    |--------------------------------------------------------------------------
    |
    */

    'path' => [

        //'migration'         => base_path($module.'database/migrations/'),
        'migration'         => app_path($module.'database/migrations/'),

        'model'             => app_path($module.'Models/'),

        'datatables'        => app_path($module.'DataTables/'),

        'repository'        => app_path($module.'Repositories/'),

        //'routes'            => base_path($module.'routes/web.php'),
        'routes'            => app_path($module.'routes/web.php'),

        //'api_routes'        => base_path($module.'routes/api.php'),
        'api_routes'        => app_path($module.'routes/api.php'),

        'request'           => app_path($module.'Http/Requests/'),

        'api_request'       => app_path($module.'Http/Requests/API/'),

        'controller'        => app_path($module.'Http/Controllers/'),

        'api_controller'    => app_path($module.'Http/Controllers/API/'),

        //'test_trait'        => base_path($module.'tests/traits/'),
        'test_trait'        => app_path($module.'tests/traits/'),

        //'repository_test'   => base_path($module.'tests/'),
        'repository_test'   => app_path($module.'tests/'),

        //'api_test'          => base_path($module.'tests/'),
        'api_test'          => app_path($module.'tests/'),

        //'views'             => base_path($module.'resources/views/'),
        'views'             => app_path($module.'resources/views/'),

       // 'schema_files'      => base_path($module.'resources/model_schemas/'),
        'schema_files'      => app_path($module.'resources/model_schemas/'),

        // 'templates_dir'     => base_path($module.'resources/infyom/infyom-generator-templates/'),
        'templates_dir'     => app_path($module.'resources/infyom/infyom-generator-templates/'),


        'modelJs'           => base_path($module.'resources/assets/js/models/'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Namespaces
    |--------------------------------------------------------------------------
    |
    */

    'namespace' => [

        'model'             => 'App\\' .$nspace. 'Models',

        'datatables'        => 'App\\' .$nspace. 'DataTables',

        'repository'        => 'App\\' .$nspace. 'Repositories',

        'controller'        => 'App\\' .$nspace. 'Http\Controllers',

        'api_controller'    => 'App\\' .$nspace. 'Http\Controllers\API',

        'request'           => 'App\\' .$nspace. 'Http\Requests',

        'api_request'       => 'App\\' .$nspace. 'Http\Requests\API',
    ],

    /*
    |--------------------------------------------------------------------------
    | Templates
    |--------------------------------------------------------------------------
    |
    */

    'templates'         => 'adminlte-templates',

    /*
    |--------------------------------------------------------------------------
    | Model extend class
    |--------------------------------------------------------------------------
    |
    */

    'model_extend_class' => 'Eloquent',

    /*
    |--------------------------------------------------------------------------
    | API routes prefix & version
    |--------------------------------------------------------------------------
    |
    */

    'api_prefix'  => 'api',

    'api_version' => 'v1',

    /*
    |--------------------------------------------------------------------------
    | Options
    |--------------------------------------------------------------------------
    |
    */

    'options' => [

        'softDelete' => true,

        'tables_searchable_default' => false,
    ],

    /*
    |--------------------------------------------------------------------------
    | Prefixes
    |--------------------------------------------------------------------------
    |
    */

    'prefixes' => [

        'route' => '',  // using admin will create route('admin.?.index') type routes

        'path' => '',

        'view' => '',  // using backend will create return view('backend.?.index') type the backend views directory

        'public' => '',
    ],

    /*
    |--------------------------------------------------------------------------
    | Add-Ons
    |--------------------------------------------------------------------------
    |
    */

    'add_on' => [

        'swagger'       => true,

        'tests'         => true,

        'datatables'    => false,

        'menu'          => [

            'enabled'       => false,

            'menu_file'     => 'layouts/menu.blade.php',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Timestamp Fields
    |--------------------------------------------------------------------------
    |
    */

    'timestamps' => [

        'enabled'       => true,

        'created_at'    => 'created_at',

        'updated_at'    => 'updated_at',

        'deleted_at'    => 'deleted_at',
    ],

    /*
    |--------------------------------------------------------------------------
    | Save model files to `App/Models` when use `--prefix`. see #208
    |--------------------------------------------------------------------------
    |
    */
    'ignore_model_prefix' => false,

];
