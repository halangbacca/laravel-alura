<?php

namespace App\Providers;

use App\Contracts\SeriesRepositoryInterface;
use App\Repositories\SeriesRepository;
use Illuminate\Support\ServiceProvider;

class SeriesRepositoryProvider extends ServiceProvider
{
    public array $bindings = [
        SeriesRepositoryInterface::class => SeriesRepository::class
    ];
}
