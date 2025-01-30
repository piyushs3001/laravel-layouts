<?php

namespace Piyush\LaravelLayouts\Console\Contracts;

interface Publishable
{
    public function isAlreadyPublished() : bool;
}