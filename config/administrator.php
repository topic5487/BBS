<?php

use Illuminate\Support\Facades\Auth;

return array(

    // 後台 URI 入口
    'uri' => 'admin',

    'domain' => '',

    'title' => env('APP_NAME', 'Laravel'),

    'model_config_path' => config_path('administrator'),

    'settings_config_path' => config_path('administrator/settings'),

    'menu' => [
        '用戶與權限' => [
            'users',
        ],
    ],

    /*
     * 返回 true 或 false ，用來檢測當前用戶是否有權限訪問後台。
     * `false` 會將頁面重定向到 `login_path` 選項定義的 URL 中。
     */
    'permission' => function () {
        // 只要是能管理內容的用戶，就允許訪問後台
        return Auth::check() && Auth::user()->can('manage_contents');
    },

    'use_dashboard' => false,

    'dashboard_view' => '',

    'home_page' => 'users',

    'back_to_site_path' => '/',

    'login_path' => 'login',

    'login_redirect_key' => 'redirect',

    'global_rows_per_page' => 20,

    'locales' => [],
);
