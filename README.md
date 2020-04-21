# authorize-slim-4
Slim 4 Authorization Tutorial

## Documentation
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
- [Global Helper Functions](https://github.com/zhorton34/authorize-slim-4#global-helper-functions)
- [Validators](https://github.com/zhorton34/authorize-slim-4#validatorinput-rules---messages--)
- [Mailables](
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
Console
----------------------------------------
 ~/tutorials/authorize-slim-4 php slim
-----------------------------------------


Console Tool

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
 make
  make:migration    Make or scaffolded new migration for our database
  make:seeder       Generate a database seeder scaffold
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
