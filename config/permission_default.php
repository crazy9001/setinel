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
        ]
    ],

    'Default Roles Permission'  =>  [

        'Secretary' =>  [
            'Quản lí users'
        ],
        'Editor'    =>  [

        ],
        'Reporter'  =>  [

        ]

    ],

    'Default User Permission'   =>  [

    ]


];