<?php

return [
    'role_structure' => [
        'owner' => [
            'users'    => 'c,r,u,d',
            'post'     => 'c,r,u,d',
            'category' => 'c,r,u,d',
            'tags'     => 'c,r,u,d',
            'setting'  => 'r,u',
            'profile'  => 'r,u'
        ],
        'superadmin' => [
            'sitting'  => 'r,u',
            'post'     => 'c,r,u,d',
            'category' => 'c,r,u,d',
            'tags'     => 'c,r,u,d',
            'profile'  => 'r,u'
        ],
        'admin' => [
            'post'     => 'c,r,u,d',
            'category' => 'c,r,u,d',
            'tags'     => 'c,r,u,d',
            'profile'  => 'r,u'
        ],
        'user' => [
            'profile'  => 'r,u'
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
