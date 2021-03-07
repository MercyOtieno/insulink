<?php

use Botble\Theme\Theme;

return [

    /*
    |--------------------------------------------------------------------------
    | Inherit from another theme
    |--------------------------------------------------------------------------
    |
    | Set up inherit from another if the file is not exists,
    | this is work with "layouts", "partials" and "views"
    |
    | [Notice] assets cannot inherit.
    |
    */

    'inherit' => null, //default

    /*
    |--------------------------------------------------------------------------
    | Listener from events
    |--------------------------------------------------------------------------
    |
    | You can hook a theme when event fired on activities
    | this is cool feature to set up a title, meta, default styles and scripts.
    |
    | [Notice] these event can be override by package config.
    |
    */

    'events' => [

        // Before event inherit from package config and the theme that call before,
        // you can use this event to set meta, breadcrumb template or anything
        // you want inheriting.
        'before' => function($theme)
        {
            // You can remove this line anytime.
        },

        // Listen on event before render a theme,
        // this event should call to assign some assets,
        // breadcrumb template.
        'beforeRenderTheme' => function (Theme $theme)
        {
            // Partial composer.
            // $theme->partialComposer('header', function($view) {
            //     $view->with('auth', \Auth::user());
            // });
            $theme->asset()
                    ->usePath()->add('bootstrap', 'vendor/bootstrap/css/bootstrap.min.css')
                    ->usePath()->add('bootstrap-grid', 'vendor/bootstrap/css/bootstrap-grid.min.css')
                    ->usePath()->add('bootstrap-reboot', 'vendor/bootstrap/css/bootstrap-reboot.min.css')
                    ->usePath()->add('uikit', 'vendor/uikit/css/uikit.min.css')
                    ->usePath()->add('theme-css', 'css/application.css')
                    ->usePath()->add('tailwind-css', 'css/tailwind.css')
                    ->usePath()->add('theme', 'css/theme.css');
            $theme->asset()->container('footer')
                    ->usePath()->add('engine', 'js/engine.js')
                    ->usePath()->add('application', 'js/application.js', ['jquery'])
                    ->usePath()->add('popper', 'js/popper.js', ['jquery'])
                    ->usePath()->add('uikit', 'vendor/uikit/js/uikit.min.js', ['jquery'])
                    ->usePath()->add('uikit', 'vendor/uikit/js/uikit-icons.min.js', ['jquery']);
            $theme->asset()->container('footer')->usePath()->add('scripts', 'js/scripts.js', ['jquery'], [], '1.0.13');

            if (function_exists('shortcode')) {
                $theme->composer(['index', 'page', 'post'], function (\Botble\Shortcode\View\View $view) {
                    $view->withShortcodes();
                });
            }
        },

        // Listen on event before render a layout,
        // this should call to assign style, script for a layout.
        'beforeRenderLayout' => [

            'default' => function ($theme)
            {
                $theme->asset()->usePath()->add('custom', 'js/custom.js', ['jquery']);
            }
        ]
    ]
];
