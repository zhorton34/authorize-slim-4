<?php

namespace App\Console\Commands;

use Illuminate\Filesystem\Filesystem;

class ViewClearCommand extends Command
{
    protected $name = 'view:clear';
    protected $description = 'Remove Cache View Templates';

    public function handler()
    {
        $files = app()->resolve(Filesystem::class);
        $path = config('blade.cache');

        throw_when(!$path, "Views cache path not found", \RuntimeException::class);

        collect($files->glob("{$path}/*"))->each(fn ($cached_view) => $files->delete($cached_view));

        $this->info("Cached Views Cleared");
    }
}
