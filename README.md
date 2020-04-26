# Authentication With Slim 4 (And much, much more)
Slim 4 Authentication Tutorial

## Documentation Sections
 - [Installation](https://github.com/zhorton34/authorize-slim-4#installation)
 - [Console Commands](https://github.com/zhorton34/authorize-slim-4#list-slim-console-commands)
 - [Migrate & Seed Database](https://github.com/zhorton34/authorize-slim-4#migrate-and-seed-database)
 - [Register Middleware](https://github.com/zhorton34/authorize-slim-4#register-middleware)
 - [Register Console Commands](https://github.com/zhorton34/authorize-slim-4#create-and-register-new-php-slim-command)
 - [php slim make:{scaffold} generators](https://github.com/zhorton34/authorize-slim-4#php-slim-makecommand-scaffold-stub-generators)
   - `php slim make:command (Scaffold New Console Command)`
   - `php slim make:controller (Scaffold new Controller)`
   - `php slim make:factory (Scaffold new Factory)`
   - `php slim make:middleware (Scaffold new Middleware)`
   - `php slim make:migration (Scaffold new migration)`
   - `php slim make:model (Scaffold new Eloquent Model)`
   - `php slim make:provider(Scaffold new Service Provider)`
   - `php slim make:request (Scaffold new FormRequest Validator)`
   - `php slim make:seeder (Scaffold new database seeder)`
   - `php slim make:event (Scaffold event class)`
   - `php slim make:listener (Scaffold event listener class)` 
- [Global Helper Functions](https://github.com/zhorton34/authorize-slim-4#global-helper-functions)
- [Validators](https://github.com/zhorton34/authorize-slim-4#validatorinput-rules---messages--)
- [Mailables](https://github.com/zhorton34/authorize-slim-4/blob/master/README.md#mailables-send-emails)
- [Events And Listeners](https://github.com/zhorton34/authorize-slim-4/blob/master/README.md#events-events--associated-listeners-with-dependency-injection)
- [Packages & Resources Glossary](https://github.com/zhorton34/authorize-slim-4#packages--resources-glossary)

# Installation

### Dependencies
 - Vagrant
 - VirtualBox or other available vagrant virtual machine provider


1. Clone, enter, and determine the path the application
```
git clone https://github.com/zhorton34/authorize-slim-4.git

cd authorize-slim-4

pwd
```

2. Copy output from `pwd` command (Full path to present working directory)

3. Open `authorize-slim-4/homestead.yaml` and update folders map path (Has comment next to it below)
```
ip: 192.168.10.10
memory: 2048
cpus: 2
provider: virtualbox
authorize: ~/.ssh/id_rsa.pub
keys:
    - ~/.ssh/id_rsa
folders:
    -
       # Replace `map: /Users/zhorton/tutorials/authorize-slim-4`
       # With `map: {the_copied_output_from_pwd_in_step_2}
        map: /Users/zhorton/tutorials/authorize-slim-4
        ## map Update with path you cloned the repository on your machine
        to: /home/vagrant/code
sites:
    -
        map: slim.auth
        to: /home/vagrant/code/public
databases:
    - slim
features:
    -
        mariadb: false
    -
        ohmyzsh: false
    -
        webdriver: false
name: authorize-slim-4
hostname: authorize-slim-4
```

4. Save and close homestead.yaml

5. Run `vagrant up --provision` to boot up your virtual machine

6. Once booted, open up your localmachine's host file (sudo vim /etc/hosts on linux or mac)

7. Add slim.auth

8. Boot up the vagrant virtual
```
  vagrant up --provision
```

9. Open your localmachines `host` file (sudo vim /etc/hosts on linux and mac)

10. Add `slim.auth` and the ip defined in the homestead.yaml
 (Example below, shouldn't need to change from example)
```
##
# Host Database
#
# localhost is used to configure the loopback interface
# when the system is booting.  Do not change this entry.
##
127.0.0.1	localhost
255.255.255.255	broadcasthost
::1             localhost

###########################
# Homestead Sites (Slim 4)
###########################
192.168.10.10   slim.auth
```

11. Close and save hosts file

12. Test out `http://slim.auth/` in your browser
(Make sure vagrant has properly finished booting from step 8)

13. `cd` back into `authorize-slim-4` within your terminal

14. Run `vagrant ssh`

15. Once ssh'd into your virtual machine, run
```
cd code && cp .env.example .env && composer install && npm install
```

===

## List Slim Console Commands

1. Run `php slim` from project root

```
sole Tool

Usage:
  command [options] [arguments]

Options:
  -h, --help            Display this help message
  -q, --quiet           Do not output any message
  -V, --version         Display this application version
      --ansi            Force ANSI output
      --no-ansi         Disable ANSI output
  -n, --no-interaction  Do not ask any interactive question
  -v|vv|vvv, --verbose  Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug

Available commands:
  help              Displays help for a command
  list              Lists commands
  tinker            
 db
  db:fresh          Drop all database table and re-migrate, then re-seed all tables
  db:migrate        Migration migrations to database
  db:seed           Run Database Seeders
  db:show           Show all of your models/table records in a table for display
 error-logs
  error-logs:clear  Remove Errors Logs Rendered Templates
 make
  make:command      Generate Command Scaffold
  make:controller   description text for console command
  make:factory      Scaffold new factory command
  make:middleware   Generate or make Scaffold for new http middleware class
  make:migration    Make or scaffolded new migration for our database
  make:model        Generate The Scaffold For An Eloquent Model
  make:provider     Scaffold new Service Provider
  make:request      Generate Form Request Validation Scaffold
  make:seeder       Generate a database seeder scaffold
  make:event        Generate event scaffold
  make:listener     Generate listener scaffold
 migrate
  migrate:rollback  Rollback Previous Database Migration
 view
  view:clear        Remove Cache For View Templates
```



## Migrate and Seed Database
1. `vagrant ssh`
2. `cd code`
3. `php slim db:migrate`
4. `php slim db:seed`


## Show database table example
1. `vagrant ssh`
2. `cd code`
3. `php slim db:show users`


## Register Middleware
1. Create Middleware Class (Example: `\App\Http\Middleware\RouteGuardMiddleware::class`)
2. Open `authorize-slim-4/app/Http/HttpKernel`
3. Add \App\Http\Middleware\RouteGuardMiddleware::class to a specific route group or globally
```
class HttpKernel extends Kernel
{
    /**
     * Global Middleware
     *
     * @var array
     */
    public array $middleware = [
//        Middleware\ExampleAfterMiddleware::class,
//        Middleware\ExampleBeforeMiddleware::class
    ];

    /**
     * Route Group Middleware
     */
    public array $middlewareGroups = [
        'api' => [],
        'web' => [
            Middleware\RouteContextMiddleware::class,
            'csrf'
        ]
    ];
}
```

## Create and Register new `php slim` command
1. Add new ExampleCommand.php File and class at app/console/commands/ExampleCommand.php
2. Define Command name, description, arguments, and handler within class
```
class ExampleCommand extends Command
{
    protected $name = 'example:command';
    protected $help = 'Example Command For Readme';
    protected $description = 'Example Command For Readme';

    public function arguments()
    {
        return [
            'hello' => $this->required('Description for this required command argument'),
            'world' => $this-optional('Description for this optional command argument', 'default')
        ];
    }

    public function handler()
    {
        /** Collect Console Input **/
        $all_arguments = $this->input->getArguments();
        $optional_argument = $this-input->getArgument('world');
        $required_argument = $this->input->getArgument('hello');

        /** Write Console Output **/
        $this->warning("warning output format");
        $this->info("Success output format");
        $this->comment("Comment output format");
        $this->error("Uh oh output format");
    }
}
```
3. Open app\console\ConsoleKernel.php
4. Add ExampleCommand::class to Registered Commands
```
<?php

namespace App\Console;

use Boot\Foundation\ConsoleKernel as Kernel;

class ConsoleKernel extends Kernel
{
    public array $commands = [
        Commands\ExampleCommand::class, // Registered example command
        Commands\ViewClearCommand::class,
        Commands\MakeSeederCommand::class,
        Commands\DatabaseRunSeeders::class,
        Commands\DatabaseFreshCommand::class,
        Commands\MakeMigrationCommand::class,
        Commands\DatabaseMigrateCommand::class,
        Commands\DatabaseTableDisplayCommand::class,
        Commands\DatabaseRollbackMigrationCommand::class
    ];
}

```

## `php slim make:{command}` Scaffold Stub Generators

1. Available Generator Commands
```
  php slim make:command {ExampleConsoleCommand}      Generate Command Scaffold
  php slim make:controller {Example} description text for console command
  php slim make:factory {ExampleFactory}      Scaffold new factory command
  php slim make:middleware {ExampleMiddleware} Generate or make Scaffold for new http middleware class
  php slim make:migration {CreateExamplesTable   Make or scaffolded new migration for our database
  php slim make:model {Example}        Generate The Scaffold For An Eloquent Model
  php slim make:provider {ExampleServiceProvider}     Scaffold new Service Provider
  php slim make:request {ExampleFormRequest}     Generate Form Request Validation Scaffold
  php slim make:seeder {ExamplesTableSeeder}       Generate a database seeder scaffold
```

2. Scaffold Generator Stubs (Dummy Files)
   - `resources/stubs`
  
3. Scaffold Configuration
   - `config/stubs.php`

## Global Helper Functions
/*
 * event
 * old
 * back
 * session
 * validator
 * asset
 * redirect
 * collect
 * factory
 * env
 * base_path
 * config_path
 * resources_path
 * public_path
 * routes_path
 * storage_path
 * app_path
 * dd (die and dump)
 * throw_when
 * class_basename
 * config
 * data_get
 * data_set
 */
 
 #### old($input_name)
 - Used within blade to populate old input data when form validation fails

**Example** 
```
<form>
  @csrf
  <input type='text' name='first_name' value='{{ old('first_name') }}' />
</form>
```


#### back()
- Redirect user back to previous page

**Example**
```
ExampleController 
{
   index()
   {
      return back();
   }
}
```

#### event()
- Set up events and event listeners 

```
event()->listen('flash.success', fn ($message) => session()->flash()->add('success', $message);

event()->fire('flash.success', ['Way to go, it worked!']);
```

**Alternatively, you can use the slim scaffold to set up event and listener classes** 
`php slim make:event ExampleEvent`
- creates App/Events/ExampleEvent
`php slim make:listener ExampleListener`
- create App/Listeners/ExampleListener

**Register Class Event & Listeners in `config/events.php`**
``` 
return [
   'events' => [
      ExampleEvent::class => [
          ExampleListener::class,
          ExampleListenerTwo::class,
          ExampleListenerThree::class
      ],
      ResetUserPasswordEvent::class => [
          GenerateResetPasswordKey::class,
          SendUserResetPasswordEmail::class,
      ]
   ]
];
```

**Finally trigger the associated event**
```
// Fire event using dependency injection
event()->fire(ExampleEvent::class);

// Fire event overriding default depency injections
event()->fire(ExampleEvent::class, [
   // parameterOne
   // parameterTwo
]);
```

#### session()
- Session (Using Syfony Session Component)

**Example**
```
// Flash to session to only remember for the proceeding request
session()->flash()->set('success', ['Successful Form Submission!']);
session()->flash()->set('errors', ['Name field failed', 'Email field failed']);

// Set directly to session to remember for several requests
session()->set('remember_in_session_for_multiple_requests', ['remember me']);
```

#### validator($input, $rules = [], $messages = [])
- Validator (Using Laravel Validators)

**Example**
```
$input = [
   'first_name' => 'John',
   'last_name' => 'Joe',
   'email' => 'john.joe@example.com'
];

$rules = [
   'first_name' => 'required|string',
   'last_name' => 'required|string|max:50',
   'email' => 'required|email|max:50|unique:users,email'
];

$messages = [
    'first_name.required' => 'First name is a required field',
    'first_name.string' => 'First name must be a string field',
    'last_name.required' => 'Last name must is a required field',
    'last_name.string' => 'Last name must be a string field',
    'email.email' => 'Email must be in the proper email format',
    'email.unique' => 'Email already taken, no duplicate emails allowed',
    'email.required' => 'Email is required',
];

$validation = validator($input, $rules, $messages);

if ($validation->fails()) {
   session()->flash()->set('errors', $validation->errors()->getMessages());
   
   return back();
}

if ($validation->passes() {
   session()->flash()->set('success', 'Successfully Submitted Form and Passed Validation');

   return redirect('/home');
}
```


## Mailables (Send Emails)

1. @see `\Boot\Foundation\Mail\Mailable`
**Example**
```
class ExampleController
{
   public function send(\Boot\Foundation\Mail\Mailable $mail, $response)
   {
       $user = \App\User::first();
       
       $success = $mail->view('mail.auth.reset', ['url' => 'https://google.com'])
            ->to($user->email, $user->first_name)
            ->from('admin@slim.auth', 'Slim Authentication Admin')
            ->subject('Reset Password')
            ->send();

       $response->getBody()->write("Successfully sent Email: {$success}");

       return $response;
   }
}
```

## Events (Events & associated listeners with dependency injection)
**Example One**
- Set up events and event listeners using the global event helper function 
_NOTE: (This example show's an easy setup, but example two is considered better architecture)_  

```
// App\Providers\EventServiceProvider boot method()

event()->listen('flash.success', fn ($message) => session()->flash()->add('success', $message);

event()->fire('flash.success', [
   'Way to go, it worked!'
]);
```

**Example Two: Event & Listener Classes** 
1. `php slim make:event UserLogin`
2. Open `App/Events/UserLogin.php`
3. Use the `UserLogin.php` event `__construct` to build or "construct" the event payload
```
<?php

namespace App\Events;

use App\Support\Auth;
use Boot\Foundation\Http\Session;

class ExampleEvent
{
    public $user;
    public $session;

    public function __construct(Session $session)
    {
        $this->user = Auth::user();
        $this->session = $session;

        return $this;
    }
}
```

4. `php slim make:listener FlashWelcomeBackMessage`
5. Open `App/Listeners/FlashWelcomeBackMessage`
6. Handle the event payload in the Listener `__invoke` method
```
<?php

namespace App\Listeners;

use App\Events\UserLogin;

class FlashWelcomeBackMessage
{
   public function __invoke(UserLogin $event)
   {
      $event->session->flash()->add('success', "Welcome Back {$event->user->first_name}!"); 
   }

}
```
**Register Class Event & Listeners in `config/events.php`**
``` 
return [
   'events' => [
      UserLogin::class => [
          FlashWelcomeBackMessage::class,
          // ExampleListenerTwo::class,
          // ExampleListenerThree::class
      ],
      // ResetUserPasswordEvent::class => [
           // GenerateResetPasswordKey::class,
           // SendUserResetPasswordEmail::class,
      // ]
   ]
];
```

**Finally trigger event**
`(Example: App\Http\Controllers\LoginController@login)`
```
public function login(StoreLoginRequest $input)
{
  if ($input->failed()) return back(); 

  if (Auth::attempt($input->email, $input->password)) 
  {
      event()->fire(\App\Events\UserLogin::class); // Fire Event

      return redirect('/home');
   }

   return back();
}
```

**Event Constructor and Listener Invoke Methods Support Dependency Injection**
// App\Http\LoginController@login
```
// Example Using UserLogin Event:
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$session = app()->resolve('session');
$different_user = \App\User::find(5); 

event()->fire(UserLogin::class, [
   $session, $different_user
]);

// Example Using Random Event
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
event()->fire(ExampleEvent::class, [
   // parameterOne
   // parameterTwo
]);

// Dependency Injection With While Using event() to register listeners
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
event()->listen('welcome-view', fn (\Jessengers\Blade\Blade $blade) => $blade->make('welcome')->render());

// Fire's event. Listeners will work using the blade instance resolved from our service container
event()->fire('welcome-view');

// inject blade instance with different template path than the one binded to our container
event()->fire('welcome-view', [
    new \Jessengers\Blade\Blade(
        base_path('vendor/package/resources/views'), 
        storage_path('cache'),
    )
]);


```
### Packages & Resources Glossary
 - [Slim 4](http://www.slimframework.com/docs/v4/)
 - [Slim Csrf](https://github.com/slimphp/Slim-Csrf)
 - [Laravel Validators](https://laravel.com/docs/7.x/validation)
 - [Laravel Homestead](https://laravel.com/docs/7.x/homestead)
 - [Jenssegers Blade](https://github.com/jenssegers/blade)
 - [Zeuxisoo Slim Whoops](https://github.com/zeuxisoo/php-slim-whoops)
 - [Php Dot Env](https://github.com/vlucas/phpdotenv)
 - [CakePhp Seeders & Migrations](https://github.com/cakephp/phinx)
 - [Fzaninotto Faker For Factories](https://github.com/fzaninotto/Faker)
 - [Illuminate Database](https://github.com/illuminate/database)
 - [Illuminate Support](https://github.com/illuminate/support)
 - [Php Dependency Injection Container](http://php-di.org/doc/)
 - [Php Dependency Injection Container Slim Bridge](https://github.com/PHP-DI/Slim-Bridge)
 - [Laravel Mix Webpack Wrapper](https://laravel-mix.com)
 - [Swift Mailer for Emails](https://github.com/swiftmailer/swiftmailer)
 - [Mailtrap for local email testing](https://mailtrap.io)
 - [Illuminate Mail For Markdown Parser](https://github.com/illuminate/mail)
 - [Symfony Console Component For Console Commands](https://symfony.com/doc/current/components/console.html)
 - [Symfony Session Component For Sessions](https://symfony.com/doc/current/session.html)
 - [Eloquent For Database ORM](https://packagist.org/packages/illuminate/database)
 - [Vuejs For Front-end Reactivity](https://vuejs.org/v2/guide/)
 - [Tailwind For CSS & SCSS](https://tailwindcss.com/components)
 - [Vue Material Design Icons](https://www.npmjs.com/package/vue-material-design-icons)
 - [Guzzle Http Wrapper](https://github.com/guzzle/guzzle)
