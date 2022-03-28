<?php

use App\Models\Category;
use Illuminate\Support\Facades\Auth;

return [
    'title'   => '分類',
    'single'  => '分類',
    'model'   => Category::class,

    'action_permissions' => [
        // 刪除權限控管
        'delete' => function () {
            // 只有站長才能刪除文章分類
            return Auth::user()->hasRole('Founder');
        },
    ],

    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'name' => [
            'title'    => '名稱',
            'sortable' => false,
        ],
        'description' => [
            'title'    => '描述',
            'sortable' => false,
        ],
        'operation' => [
            'title'  => '管理',
            'sortable' => false,
        ],
    ],
    'edit_fields' => [
        'name' => [
            'title' => '名稱',
        ],
        'description' => [
            'title' => '描述',
            'type'  => 'textarea',
        ],
    ],
    'filters' => [
        'id' => [
            'title' => '分類 ID',
        ],
        'name' => [
            'title' => '名稱',
        ],
        'description' => [
            'title' => '描述',
        ],
    ],
    'rules'   => [
        'name' => 'required|min:1|unique:categories'
    ],
    'messages' => [
        'name.unique'   => '分類名在資料庫中重複，請選用其他名稱。',
        'name.required' => '請確保名字至少一個字以上',
    ],
];
