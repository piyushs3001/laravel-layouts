<?php

namespace Piyush\LaravelLayouts\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Piyush\LaravelLayouts\Console\Contracts\Publishable;
use Piyush\LaravelLayouts\Console\Contracts\Resolveable;
use Piyush\LaravelLayouts\Console\Traits\PublishableTrait;

class InstallSeeder extends Command implements Publishable, Resolveable
{

    use PublishableTrait;

    protected $hidden = true;

    protected $signature = 'laravel-layouts:seeders {--force}';

    protected $description = 'Install the seeders of laravel layouts packages.';

    public function handle()
    {

        $this->info('Seeder files publishing.');
        if (!$this->isAlreadyPublished() || $this->option('force')) {

            $this->publish(tag: 'laravel-layouts-seeders');
            $this->resolveNamespace();
            $this->info('Seeder files published.');
        } else {

            if ($this->shouldOverwrite('Seeder files already exists. Do you want to overwrite it?')) {
                $this->info('Overwriting seeder files...');
                $this->publish(forcePublish: true, tag: 'laravel-layouts-seeders');
                $this->resolveNamespace();
                $this->info('Seeder files published.');
            } else {
                $this->info('Seeder files was not overwritten');
            }
        }
    }

    public function isAlreadyPublished(): bool
    {
        return File::exists(database_path('seeders/AdminsTableSeeder.php'));
    }

    public function resolveNamespace(): void
    {
        $this->updateNamespace(
            database_path('seeders/'),
            'Piyush\LaravelLayouts\Database\Seeders',
            'Database\Seeders'
        );
    }
}
