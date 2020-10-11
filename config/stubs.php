<?php

return [
    'make:listener' => [
        'file' => '{DummyFile}Listener.stub',
        'content' => file_get_contents(resources_path('stubs/{DummyFile}Listener.stub')),
        'make_path' => app_path('Listeners'),

        'replace' => [
            'file' => [
                'stub' => 'php',
                '{DummyFile}Listener' => ':name:',
            ],
            'content' => [
                '{DummyFile}' => ':name:',
                '{DummyClass}' => ':name:',
                '{DummyNamespace}' => 'App\\Listeners',
            ]
        ]
    ],
    'make:event' => [
        'file' => '{DummyFile}Event.stub',
        'content' => file_get_contents(resources_path('stubs/{DummyFile}Event.stub')),
        'make_path' => app_path('Events'),

        'replace' => [
            'file' => [
                'stub' => 'php',
                '{DummyFile}Event' => ':name:',
            ],
            'content' => [
                '{DummyFile}' => ':name:',
                '{DummyClass}' => ':name:',
                '{DummyNamespace}' => 'App\\Events',
            ]
        ]
    ],
    'make:middleware' => [
        'file' => '{DummyFile}Middleware.stub',
        'content' => file_get_contents(resources_path('stubs/{DummyFile}Middleware.stub')),
        'make_path' => app_path('Http/Middleware'),

        'replace' => [
            'file' => [
                'stub' => 'php',
                '{DummyFile}Middleware' => ':name:',
            ],
            'content' => [
                '{DummyFile}' => ':name:',
                '{DummyClass}' => ':name:',
                '{DummyNamespace}' => 'App\\Http\\Middleware',
            ]
        ]
    ],
    'make:provider' => [
        'file' => '{DummyFile}ServiceProvider.stub',
        'content' => file_get_contents(resources_path('stubs/{DummyFile}ServiceProvider.stub')),
        'make_path' => app_path('providers'),

        'replace' => [
            'file' => [
                'stub' => 'php',
                '{DummyFile}ServiceProvider' => ':name:',
            ],
            'content' => [
                '{DummyFile}' => ':name:',
                '{DummyClass}' => ':name:',
                '{DummyNamespace}' => 'App\\Providers',
            ]
        ]
    ],
    'make:model' => [
        'file' => '{DummyModel}.stub',
        'content' => file_get_contents(resources_path('stubs/{DummyModel}.stub')),
        'make_path' => app_path(''),

        'replace' => [
            'file' => [
                'stub' => 'php',
                '{DummyModel}' => ':model:',
            ],
            'content' => [
                '{DummyModel}' => ':model:',
                '{DummyNamespace}' => 'App',
                '{DummyModel|snake}' => ':model:',
            ]
        ]
    ],
    'make:controller' => [
        'file' => '{DummyFile}Controller.stub',
        'content' => file_get_contents(resources_path('stubs/{DummyFile}Controller.stub')),
        'make_path' => app_path('Http/Controllers'),

        'replace' => [
            'file' => [
                'stub' => 'php',
                '{DummyFile}' => ':name:',
                '{DummyFile|snake}' => ':name:'
            ],
            'content' => [
                '{DummyFile}' => ':name:',
                '{DummyFile|snake}' => ':name:',
                '{DummyNamespace}' => 'App\\Http\\Controllers'
            ]
        ]
    ],

    'make:factory' => [
        'file' => '{DummyModel}Factory.stub',
        'content' => file_get_contents(resources_path('stubs/{DummyModel}Factory.stub')),

        'make_path' => database_path('factories'),

        'replace' => [
            'file' => [
                'stub' => 'php',
                '{DummyModel}' => ':model:'
            ],
            'content' => [
                '{DummyModel}' => ':model:',
            ]
        ]
    ],
    'make:command' => [
        'file' => '{DummyFile}Command.stub',
        'content' => file_get_contents(resources_path('stubs/{DummyFile}Command.stub')),
        'make_path' => app_path('Console/Commands'),

        'replace' => [
            'file' => [
                'stub' => 'php',
                '{DummyFile}Command' => ':name:'
            ],
            'content' => [
                '{DummyClass}' => ':name:',
                '{DummyNamespace}' => 'App\\Console\\Commands'
            ]
        ]
    ],
    'make:request' => [
        'file' => '{DummyFile}Request.stub',
        'content' => file_get_contents(resources_path('stubs/{DummyFile}Request.stub')),

        'make_path' => app_path('Http/Requests'),

        'replace' => [
            'file' => [
                'stub' => 'php',
                '{DummyFile}Request' => ':name:'
            ],
            'content' => [
                '{DummyClass}' => ':name:',
                '{DummyNamespace}' => 'App\\Http\\Requests'
            ]
        ],

    ],

    'make:trait' => [
        'file' => '{DummyFile}Trait.stub',
        'content' => file_get_contents(resources_path('stubs/{DummyFile}Trait.stub')),

        'make_path' => app_path('Traits'),

        'replace' => [
            'file' => [
                'stub' => 'php',
                '{DummyFile}' => ':name:'
            ],
            'content' => [
                '{DummyClass}' => ':name:',
                '{DummyNamespace}' => 'App\\Traits'
            ]
        ],
    ]
];
