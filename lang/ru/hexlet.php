<?php

return [
    'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
    'validation' => [
        'status' => [
            'unique' => 'Статус с таким именем уже существует'
        ],
        'label' => [
            'unique' => 'Метка с таким именем уже существует'
        ]
    ],
    "navigation" => [
        'logo' => 'Менеджер задач',
        'tasks' => 'Задачи',
        'statuses' => 'Статусы',
        'labels' => 'Метки',
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
        'update' => 'Обновить',
        'apply' => 'Применить'
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
        ],
        'edit' => [
            'title' => 'Изменение статуса'
        ],
        'create' => [
            'title' => 'Создание статуса'
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
                'labels' => 'Метки'
            ],
            'placeholders' => [
                'status' => 'Выберите статус',
                'assigned' => 'Выберите исполнителя',
                'filters' => [
                    'status' => 'Статус',
                    'author' => 'Автор',
                    'assigned' => 'Исполнитель'
                ]
            ]
        ],
        'show' => [
            'title' => 'Задача:',
            "fields" => [
                'name' => 'Имя:',
                'status' => 'Статус:',
                'description' => 'Описание:',
                'labels' => 'Метки:'
            ]
        ],
        'edit' => [
            'title' => 'Изменение задачи'
        ],
        'create' => [
            'title' => 'Создание задачи'
        ]
    ],
    'labels' => [
        'title' => 'Метки',
        'actions' => [
            'create' => 'Создать метку',
            'edit' => 'Изменить',
            'delete' => 'Удалить'
        ],
        'table' => [
            'id' => 'ID',
            'name' => 'Имя',
            'description' => 'Описание',
            'created_at' => 'Дата создания',
            'actions' => 'Действия'
        ],
        'form' => [
            'labels' => [
                'name' => 'Имя',
                'description' => 'Описание'
            ]
        ],
        'edit' => [
            'title' => 'Изменение метки'
        ],
        'create' => [
            'title' => 'Создание метки'
        ]
    ],
    "notify" => [
        'status' => [
            'success' => [
                'create' => 'Статус успешно создан!',
                'update' => 'Статус успешно изменён!',
                'destroy' => 'Статус успешно удален!'
            ],
            'error' => [
                'destroy' => 'Не удалось удалить cтатус!'
            ]
        ],
        'task' => [
            'success' => [
                'create' => 'Задача успешно создана!',
                'update' => 'Задача успешно изменена!',
                'destroy' => 'Задача успешно удалена!'
            ]
        ],
        'label' => [
            'success' => [
                'create' => 'Метка успешно создана!',
                'update' => 'Метка успешно изменена!',
                'destroy' => 'Метка успешно удалена!'
            ],
            'error' => [
                'destroy' => 'Не удалось удалить метку!'
            ]
        ],
    ]
];
