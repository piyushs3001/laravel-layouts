<?php

namespace Piyush\LaravelLayouts\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Piyush\LaravelLayouts\Console\Contracts\Publishable;
use Piyush\LaravelLayouts\Console\Contracts\Resolveable;
use Piyush\LaravelLayouts\Console\Traits\PublishableTrait;

class InstallModel extends Command implements Publishable, Resolveable
{

    use PublishableTrait;

    protected $hidden = true;

    protected $signature = 'laravel-layouts:models {--force}';

    protected $description = 'Install the models of laravel layouts packages.';

    public function handle()
    {

        $this->info('Models files publishing.');
        if (!$this->isAlreadyPublished() || $this->option('force')) {

            $this->publish(tag: 'laravel-layouts-models');
            $this->resolveNamespace();
            $this->info('Models files published.');
        } else {

            if ($this->shouldOverwrite('Models files already exists. Do you want to overwrite it?')) {
                $this->info('Overwriting models files...');
                $this->publish(forcePublish: true, tag: 'laravel-layouts-models');
                $this->resolveNamespace();
                $this->info('Model files published.');
            } else {
                $this->info('Model files was not overwritten');
            }
        }
    }

    public function isAlreadyPublished(): bool
    {
        return File::exists(app_path('Models/Admin.php'));
    }

    public function resolveNamespace(): void
    {
        $this->updateNamespace(
            app_path('Models/'),
            'Piyush\LaravelLayouts\Models',
            'App\Models'
        );
    }
}
