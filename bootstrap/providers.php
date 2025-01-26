<?php

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\RouteServiceProvider::class,
    // custom service providers
    App\Providers\GuardianServiceProvider::class,
    App\Providers\NewsApiServiceProvider::class,
    App\Providers\NewYorkTimesServiceProvider::class,
];
