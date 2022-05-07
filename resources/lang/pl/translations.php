<?php

return [

    'headers' => [
        'technologies' => 'Technologie',
        'levels' => 'Poziomy',
        'certificates' => 'Certyfikaty',
        'languages' => 'Języki obce',
        'school_types' => 'Rodzaje Szkół',
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

        'levels' => [
            'success' => [
                'stored' => 'Dodano poziom :name',
                'updated' => 'Zaktualizowano poziom :name',
                'nothing-changed' => 'Dane poziomu :name nie zmieniły się',
                'destroy' => 'Poziom :name została usunięty',
                'restore' => 'Poziom :name została przywrócony'
            ]
        ],

        'certificates' => [
            'success' => [
                'stored' => 'Dodano certyfikat :name',
                'updated' => 'Zaktualizowano certyfikat :name',
                'nothing-changed' => 'Dane certyfikatu :name nie zmieniły się',
                'destroy' => 'Certyfikat :name został usunięty',
                'restore' => 'Certyfikat :name został przywrócony'
            ]
        ],

        'languages' => [
            'success' => [
                'stored' => 'Dodano język :name',
                'updated' => 'Zaktualizowano język :name',
                'nothing-changed' => 'Dane języka :name nie zmieniły się',
                'destroy' => 'Język :name został usunięty',
                'restore' => 'Język :name został przywrócony'
            ]
        ],

        'school_types' => [
            'success' => [
                'stored' => 'Dodano Rodzaj szkoły :name',
                'updated' => 'Zaktualizowano Rodzaj szkoły :name',
                'nothing-changed' => 'Dane Rodzaju szkoły :name nie zmieniły się',
                'destroy' => 'Rodzaj szkoły :name został usunięty',
                'restore' => 'Rodzaj szkoły :name został przywrócony',
            ]
        ],
    ],

    'validation' => [

        'technology' => [
            'name_unique' => 'Istnieje już technologia, dla którego :attribute ma podaną wartość',
        ],

        'level' => [
            'name_unique' => 'Istnieje już poziom, dla którego :attribute ma podaną wartość',
        ],

        'certificates' => [
            'name_unique' => 'Istnieje już certyfikat, dla którego :attribute ma podaną wartość',
        ],

        'languages' => [
            'name_unique' => 'Istnieje już język, dla którego :attribute ma podaną wartość',
        ],

        'school_types' => [
            'name_unique' => 'Istnieje już Rodzaj szkoły, dla którego :attribute ma podaną wartość',
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
        'levels' => 'Poziomy',
        'certificates' => 'Certyfikaty',
        'languages' => 'Języki obce',
        'school_types' => 'Rodzaje Szkół',

    ],

    'questions' => [
        'delete' => 'Czy na pewno chcesz usunąć :name?',
        'restore' => 'Czy na pewno chcesz przywrócić :name?'
    ]

];
