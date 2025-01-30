<?php

namespace Piyush\LaravelLayouts\Console\Traits;


use DirectoryIterator;
use Illuminate\Support\Facades\File;

trait PublishableTrait
{

    private function shouldOverwrite($message)
    {
        return $this->confirm($message, false);
    }

    private function publish($forcePublish = false, $tag = 'laravel-layouts-config')
    {
        $params = [
            '--provider' => "Piyush\LaravelLayouts\LaravelLayoutsServiceProvider",
            '--tag' => $tag
        ];

        if ($forcePublish === true) {
            $params['--force'] = true;
        }

        $this->call('vendor:publish', $params);
    }

    public function updateNamespace($pathToScan, $namespace, $namespaceToUpdate)
    {
        $files = new DirectoryIterator($pathToScan);
        foreach ($files as $file) {
            if ($file->isFile()) {
                $path = $pathToScan . $file->getFilename();
                $content = File::get($path);
                $content = str_replace($namespace, $namespaceToUpdate, $content);
                File::put($path, $content);
            }
        }
    }
}
