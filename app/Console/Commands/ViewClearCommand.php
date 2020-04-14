<?php

namespace App\Console\Commands;

use Illuminate\Filesystem\Filesystem;

class ViewClearCommand extends Command
{
    protected $name = 'view:clear';

    protected $description = 'Clear all compiled view files';

    public function handler()
    {
        $files = new Filesystem();
        $path = config('blade.cache');

        if (!$path) {
            throw new \RuntimeException('View path not found');
        }

        foreach ($files->glob("{$path}/*") as $view) {
            $files->delete($view);
        }

        $this->info('Compiled views cleared!');
    }
}
