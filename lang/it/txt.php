<?php

declare(strict_types=1);

return [
    'fields' => [
        'email' => [
            'label' => 'Email',
            'placeholder' => 'Inserisci la tua email',
            'tooltip' => 'Usa un indirizzo email valido',
            'icon' => 'heroicon-o-mail',
        ],
        'password' => [
            'label' => 'Password',
            'placeholder' => 'Inserisci la tua password',
            'tooltip' => 'La password deve contenere almeno 8 caratteri',
            'icon' => 'heroicon-o-lock-closed',
        ],
        'remember' => [
            'label' => 'Ricordami',
            'tooltip' => 'Mantieni l\'accesso attivo su questo dispositivo',
        ],
    ],
    'actions' => [
        'authenticate' => [
            'label' => 'Autentica',
            'tooltip' => 'Effettua il login nel sistema',
            'icon' => 'heroicon-o-login',
            'color' => 'primary',
        ],
        'login' => [
            'label' => 'Accedi',
            'tooltip' => 'Accedi con le tue credenziali',
            'icon' => 'heroicon-o-key',
            'color' => 'success',
        ],
    ],
];
