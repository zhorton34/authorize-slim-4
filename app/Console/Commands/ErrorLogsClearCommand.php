<?php

namespace App\Console\Commands;

use Illuminate\Filesystem\Filesystem;

class ErrorLogsClearCommand extends Command
{
    protected $name = 'error-logs:clear';
    protected $description = 'Remove Errors Logs Rendered Templates';

    public function handler()
    {
        $files = app()->resolve(Filesystem::class);
        $path = storage_path('error_logs');

        throw_when(!$path, "Views cache path not found", \RuntimeException::class);

        collect($files->glob("{$path}/*"))->each(fn ($error_log) => $files->delete($error_log));

        $this->info("Error Logs Cleared Successfully!");
    }
}
