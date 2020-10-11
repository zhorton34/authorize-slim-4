<?php

namespace App\Console\Commands;

class MakeViewCommand extends MakeScaffoldCommand
{
    protected $name = 'make:view';
    protected $help = 'Generate view Scaffold';
    protected $description = 'Generate view Scaffold';

    public function arguments()
    {
        return [
            'name' => $this->require('New view Name')
        ];
    }

    public function handler()
    {

        $name = $this->input->getArgument('name');

        $this->info("======================================");

        $this->info('Generating '. $name .' views Scaffold' );

        $this->info("======================================");

        if(preg_match('/[A-Z]/', $name)){

            // check if there is at least one uppercase letter
            $this->info("================================================================================================");
            $this->error('Error: Your view name cannot contain an upper case letter. Try putting everything in lower case');
            $this->info("================================================================================================");

        }
        else if( strpos( $name, "." ) !== false ) {

            // check if there is dot (.) in the name arg
            $this->info("===========================================");

            $this->error('Error: Your view name cannot contain a dot');

            $this->info("===========================================");

        }
        else {
                
            //we just need to copy the view template to the resources/views/ folder

            $sourcePath = resources_path('stubs/views');
            $path = resources_path('views/'.$name);

            if (!is_dir($path)) {

                mkdir(resources_path('views/'.$name));

            } 
            else {

                $this->info("====================");

                $this->error('Error: path exixst!');

                $this->info("====================");

                return false;
            }

            $destinationPath = resources_path('views/'.$name);       

            copy($sourcePath.'/create.blade.php', $destinationPath.'/create.blade.php');
            copy($sourcePath.'/edit.blade.php', $destinationPath.'/edit.blade.php');
            copy($sourcePath.'/show.blade.php', $destinationPath.'/show.blade.php');
            $copyViews = copy($sourcePath.'/index.blade.php', $destinationPath.'/index.blade.php');

            if($copyViews){

                $this->info("==============================================================================================");
                $this->info('four (4) view files have been created in the resources/views/' . $name .' folder');
                $this->info("==============================================================================================");

                return true;
            }

            $this->error("===========================================================================");
            $this->info('sorry! unable to create views in the resources/views/' . $name .' folder');
            $this->error("===========================================================================");
            
            return false;
            
        }

        
    }
}
