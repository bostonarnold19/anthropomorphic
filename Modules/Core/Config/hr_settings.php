<?php

return [
    'schedule_days' => [
        0 => [
            'days' => '261',
            'name' => 'Monday to Friday',
        ],
        1 => [
            'days' => '313',
            'name' => 'Monday to Saturday',
        ],
        3 => [
            'days' => '365',
            'name' => 'Monday to Sunday',
        ],
    ],

    'holiday_type' => [
        0 => [
            'rate' => '1.3',
            'name' => 'Special Non-working Holiday',
        ],
        1 => [
            'rate' => '2.0',
            'name' => 'Regular Holiday',
        ],
    ],

    'employment_type' => [
        0 => [
            'name' => 'Full-Time',

        ],
        1 => [
            'name' => 'Part-Time',

        ],
    ],

    'marital_status' => [
        'Single', 'Married', 'Widowed', 'Divorced', 'Separated',
    ],

    'educational_level' => [
        "Associate's degree",
        "Bachelor's degree",
        "Master's degree",
        "Doctoral degree",
    ],
];
