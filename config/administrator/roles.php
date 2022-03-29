<?php

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

return [
    'title'   => '角色',
    'single'  => '角色',
    'model'   => Role::class,

    'permission'=> function()
    {
        return Auth::user()->can('manage_users');
    },

    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'name' => [
            'title' => '名稱'
        ],
        'permissions' => [
            'title'  => '權限',
            'output' => function ($value, $model) {
                $model->load('permissions');
                $result = [];
                foreach ($model->permissions as $permission) {
                    $result[] = $permission->name;
                }

                return empty($result) ? 'N/A' : implode(' | ', $result);
            },
            'sortable' => false,
        ],
        'operation' => [
            'title'  => '管理',
            'output' => function ($value, $model) {
                return $value;
            },
            'sortable' => false,
        ],
    ],

    'edit_fields' => [
        'name' => [
            'title' => '名稱',
        ],
        'permissions' => [
            'type' => 'relationship',
            'title' => '權限',
            'name_field' => 'name',
        ],
    ],

    'filters' => [
        'id' => [
            'title' => 'ID',
        ],
        'name' => [
            'title' => '名稱',
        ]
    ],

    // 創建和編輯時的表單驗證
    'rules' => [
        'name' => 'required|max:15|unique:roles,name',
    ],

    // 表單驗證錯誤時的訊息
    'messages' => [
        'name.required' => '請輸入名稱',
        'name.unique' => '名稱已經存在',
    ]
];
