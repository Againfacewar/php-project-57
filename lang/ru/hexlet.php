<?php

return [
    'validation' => [
        'status' => [
            'unique' => 'Статус с таким именем уже существует'
        ]
    ],
    "navigation" => [
        'logo' => 'Менеджер задач',
        'tasks' => 'Задачи',
        'statuses' => 'Статусы',
        'tags' => 'Метки',
        'login' => 'Вход',
        'registration' => 'Регистрация',
        'dropdown' => [
            'profile' => 'Профиль',
            'logout' => 'Выйти'
        ]
    ],
    'buttons' => [
      'create' => 'Создать',
        'edit' => 'Изменить',
        'update' => 'Обновить'
    ],
    "statuses" => [
        'title' => 'Статусы',
        'actions' => [
            'create' => 'Создать статус',
            'edit' => 'Изменить',
            'delete' => 'Удалить'
        ],
        'table' => [
            'head' => [
                'id' => 'ID',
                'name' => 'Имя',
                'created_at' => 'Дата создания',
                'actions' => 'Действия'
            ]
        ],
        'form' => [
            'labels' => [
                'name' => 'Имя'
            ]
        ]
    ],
    'tasks' => [
        'title' => 'Задачи',
        'actions' => [
            'create' => 'Создать задачу',
            'edit' => 'Изменить',
            'delete' => 'Удалить'
        ],
        'table' => [
            'id' => 'ID',
            'status' => 'Статус',
            'name' => 'Имя',
            'author' => 'Автор',
            'assigned' => 'Исполнитель',
            'created_at' => 'Дата создания',
            'actions' => 'Действия'
        ],
        'form' => [
            'labels' => [
                'name' => 'Имя',
                'description' => 'Описание',
                'status' => 'Статус',
                'assigned' => 'Исполнитель',
                'tags' => 'Метки'
            ],
            'placeholders' => [
                'status' => 'Выберите статус',
                'assigned' => 'Выберите исполнителя'
            ]
        ],
        'show' => [
            'title' => 'Задача:',
            "fields" => [
                'name' => 'Имя:',
                'status' => 'Статус:',
                'description' => 'Описание:',
                'tags' => 'Метки:'
            ]
        ],
        'edit' => [
            'title' => 'Изменение задачи'
        ]
    ]
];
