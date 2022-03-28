<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;

return [
    'title'   => '用戶',

    'single'  => '用戶',

    'model'   => User::class,

    'permission'=> function()
    {
        return Auth::user()->can('manage_users');
    },

    'columns' => [

        'id',

        'avatar' => [
            'title'  => '頭貼',

            'output' => function ($avatar, $model) {
                return empty($avatar) ? 'N/A' : '<img src="'.$avatar.'" width="40">';
            },

            'sortable' => false,
        ],

        'name' => [
            'title'    => '用戶名',
            'sortable' => false,
            'output' => function ($name, $model) {
                return '<a href="/users/'.$model->id.'" target=_blank>'.$name.'</a>';
            },
        ],

        'email' => [
            'title' => '信箱',
        ],

        'operation' => [
            'title'  => '管理',
            'sortable' => false,
        ],
    ],

    'edit_fields' => [
        'name' => [
            'title' => '用戶名',
        ],
        'email' => [
            'title' => '信箱',
        ],
        'password' => [
            'title' => '密碼',
            'type' => 'password',
        ],
        'avatar' => [
            'title' => '用戶頭貼',
            'type' => 'image',

            'location' => public_path() . '/uploads/images/avatars/',
        ],
        'roles' => [
            'title'      => '用戶角色',

            'type'       => 'relationship',

            'name_field' => 'name',
        ],
    ],

    'filters' => [
        'id' => [

            'title' => '用戶 ID',
        ],
        'name' => [
            'title' => '用戶名',
        ],
        'email' => [
            'title' => '信箱',
        ],
    ],

];
