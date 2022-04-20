<?php

return [

    'headers' => [
        'technologies' => 'Technologie',
    ],

    'labels' => [
        'edit' => 'Edycja',
        'create' => 'Dodaj',
        'restore' => 'Przywróć',
        'destroy' => 'Usuń'
    ],

    'auth' => [
        'reset_send' => 'Link do zresetowania hasła został wysłany',
        'invalid_token' => 'Niepoprawny token',
        'password_changed' => 'Twoje hasło zostało zmienione.'
    ],

    'toasts' => [

        'technologies' => [
            'success' => [
                'stored' => 'Dodano technologie :name',
                'updated' => 'Zaktualizowano technologie :name',
                'nothing-changed' => 'Dane technologii :name nie zmieniły się',
                'destroy' => 'Technologia :name została usunięta',
                'restore' => 'Technologia :name została przywrócona'
            ]
        ],
    ],

    'validation' => [

        'technology' => [
            'name_unique' => 'Istnieje już technologia, dla którego :attribute ma podaną wartość',
        ],

    ],

    'attributes' => [

        'main' => [
            'name' => 'nazwa',
            'created_at' => 'utworzony',
            'updated_at' => 'aktualizowany',
            'deleted_at' => 'usunięty',
        ],
    ],

    'buttons' => [
        'cancel' => 'Anuluj',
        'store' => 'Dodaj',
        'update' => 'Aktualizuj',
        'restore' => 'Przywróć',
        'delete' => 'Usuń',
        'yes' => 'Tak',
        'no' => 'Nie'
    ],

    'menu' => [
        'profile' => 'Profil użytkownika',
        'settings' => 'Ustawienia',
        'logout' => 'Wyloguj',
        'technologies' => 'Technologie',
    ]

];
