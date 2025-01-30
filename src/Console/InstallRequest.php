<?php

namespace Piyush\LaravelLayouts\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Piyush\LaravelLayouts\Console\Contracts\Publishable;
use Piyush\LaravelLayouts\Console\Contracts\Resolveable;
use Piyush\LaravelLayouts\Console\Traits\PublishableTrait;

class InstallRequest extends Command implements Publishable, Resolveable
{

    use PublishableTrait;
    
    protected $hidden = true;

    protected $signature = 'laravel-layouts:requests {--force}';

    protected $description = 'Install the requests of laravel layouts packages.';

    public function handle()
    {
        
        $this->info('Request files publishing.');
        if (!$this->isAlreadyPublished() || $this->option('force')) {

            $this->publish(tag: 'laravel-layouts-requests');
            $this->resolveNamespace();
            $this->info('Request files published.');
        } else {

            if ($this->shouldOverwrite('Request files already exists. Do you want to overwrite it?')) {
                $this->info('Overwriting request files...');
                $this->publish(forcePublish: true, tag: 'laravel-layouts-requests');
                $this->resolveNamespace();
                $this->info('Request files published.');
            } else {
                $this->info('Request files was not overwritten');
            }
        }
    }

    public function isAlreadyPublished() : bool
    {
        return File::exists(app_path('/Http/Requests/AppVersionRequest.php'))
            || File::exists(app_path('/Http/Requests/ForgotPasswordRequest.php'))
            || File::exists(app_path('/Http/Requests/LoginRequest.php'))
            || File::exists(app_path('/Http/Requests/RegisterRequest.php'))
            || File::exists(app_path('/Http/Requests/ResetPasswordRequest.php'))
            || File::exists(app_path('/Http/Requests/SendOTPRequest.php'))
            || File::exists(app_path('/Http/Requests/SocialLoginRequest.php'))
            || File::exists(app_path('/Http/Requests/UpdateLocaleRequest.php'))
            || File::exists(app_path('/Http/Requests/UpdateMobileRequest.php'))
            || File::exists(app_path('/Http/Requests/UpdatePasswordRequest.php'))
            || File::exists(app_path('/Http/Requests/VerifyEmailRequest.php'))
            || File::exists(app_path('/Http/Requests/VerifyOTPRequest.php'))
            || File::exists(app_path('/Http/Requests/RefreshTokenRequest.php'));
    }

    public function resolveNamespace() :void
    {
        $this->updateNamespace(
            app_path('Http/Requests/'),
            'Piyush\LaravelLayouts\Http\Requests',
            'App\Http\Requests'
        );
    }
}
