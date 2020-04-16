<?php


namespace Boot\Foundation\Providers;

use DB;
use Illuminate\Translation\Translator;
use Boot\Foundation\Http\ValidatorFactory;
use Illuminate\Validation\DatabasePresenceVerifier;
use Illuminate\Validation\DatabasePresenceVerifierInterface;

class ValidatorServiceProvider extends SlimServiceProvider
{
    public function register()
    {
        $this->bind(
            DatabasePresenceVerifierInterface::class,
            fn(DB $capsule) => new DatabasePresenceVerifier($capsule->getDatabaseManager())
        );

        $this->bind(
            ValidatorFactory::class,
            function (Translator $translator, DatabasePresenceVerifierInterface $presenceVerifier, DB $capsule) {

                $connections = config('database.connections');
                $default_connection = config('database.default');
                $capsule->addConnection(data_get($connections, $default_connection), 'default');

                $validator = new ValidatorFactory($translator);
                $validator->setPresenceVerifier($presenceVerifier);

                return $validator;
        });
    }
}
