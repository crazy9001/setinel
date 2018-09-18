<?php
/**
 * Created by PhpStorm.
 * User: PC01
 * Date: 9/17/2018
 * Time: 9:45 PM
 */

return [

    'Default Permission' => [

        'Quản lí users'  =>  [
            [
                'permission'    =>  'users.index',
                'label' =>  'Danh sách user'
            ],
            [
                'permission'    =>  'users.store',
                'label' =>  'Thêm mới user'
            ]
        ],
        'Quản lí chuyên mục'    =>  [
            [
                'permission'    =>  'categories.index',
                'label' =>  'Danh sách chuyên mục'
            ],
            [
                'permission'    =>  'categories.store',
                'label' =>  'Thêm mới chuyên mục'
            ]
        ]
    ],

    'Default Roles Permission'  =>  [

        'Secretary' =>  [
            'Quản lí users',
            'Quản lí chuyên mục'
        ],
        'Editor'    =>  [

        ],
        'Reporter'  =>  [

        ]

    ],

    'Default User Permission'   =>  [

    ]


];