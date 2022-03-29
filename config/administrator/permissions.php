<?php

use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;

return [
    'title'   => '權限',
    'single'  => '權限',
    'model'   => Permission::class,

    'permission' => function () {
        return Auth::user()->can('manage_users');
    },

    // 對 CRUD 動作的單獨權限控制，透過返回Boolean來控制權限。
    'action_permissions' => [
        'create' => function ($model) {
            return true;
        },
        'update' => function ($model) {
            return true;
        },
        'delete' => function ($model) {
            return false;
        },
        'view' => function ($model) {
            return true;
        },
    ],

    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'name' => [
            'title'    => '名稱',
        ],
        'operation' => [
            'title'    => '管理',
            'sortable' => false,
        ],
    ],

    'edit_fields' => [
        'name' => [
            'title' => '名稱（請謹慎修改）',
        ],
        'roles' => [
            'type' => 'relationship',
            'title' => '角色',
            'name_field' => 'name',
        ],
    ],

    'filters' => [
        'name' => [
            'title' => '名稱',
        ],
    ],
];
