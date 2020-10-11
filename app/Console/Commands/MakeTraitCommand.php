<?php

namespace App\Console\Commands;


class MakeTraitCommand extends MakeScaffoldCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:trait';

    /**
     * The console command help.
     *
     * @var string
     */
    protected $help = 'Generate a new trait file';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new trait';


    protected function arguments()
    {
        return [
            'name' => $this->require('MakeTrait name command description'),
        ];
    }
    
    public function handler()
    {

		$this->info("=========================");
		$this->info("Generating New Trait File");
		$this->info("=========================");

       	$file = $this->scaffold(
            $this->stub('file'),
            $this->stub('replace.file')
        );

        $content = $this->scaffold(
            $this->stub('content'),
            $this->stub('replace.content')
        );

        if (!is_dir(app_path('Traits'))) {

            mkdir(app_path('Traits'));

        } 

        $path = "{$this->stub('make_path')}/{$file}";

        $exists = $this->files->exists($path);

        if ($exists) {
            return $this->error("{$file} already exists!");
        }

        $status = $this->files->put($path, $content);

        return $this->info("Successfully Generated {$file}! (status: {$status})");

       	$this->info("=================================");
       	$this->info("Trait File Generated Successfully");
       	$this->info("=================================");
    }


}
