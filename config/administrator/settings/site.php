<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;

return [
    'title' => '網站設定',

    // 訪問權限 只允許站長
    'permission'=> function()
    {
        return Auth::user()->hasRole('Founder');
    },

    'edit_fields' => [
        'site_name' => [
            'title' => '網站名稱',

            'type' => 'text',

            'limit' => 50,
        ],
        'contact_email' => [
            'title' => '聯絡信箱',
            'type' => 'text',
            'limit' => 50,
        ],
        'seo_description' => [
            'title' => 'SEO - Description',
            'type' => 'textarea',
            'limit' => 250,
        ],
        'seo_keyword' => [
            'title' => 'SEO - Keywords',
            'type' => 'textarea',
            'limit' => 250,
        ],
    ],

    'rules' => [
        'site_name' => 'required|max:50',
        'contact_email' => 'email',
    ],

    'messages' => [
        'site_name.required' => '請填寫網站名稱',
        'contact_email.email' => '請填寫正確的信箱',
    ],

    /*'before_save' => function(&$data)
    {
        if (strpos($data['site_name'], 'Powered by BBS') === false) {
            $data['site_name'] .= ' - Powered by BBS';
        }
    },*/
];
