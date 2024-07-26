<?php

namespace App\Providers;

use App\Models\Colis;
use App\Policies\ColisPolicy;
use App\Models\Reservation;
use App\Policies\ReservationPolicy;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
        Colis::class => ColisPolicy::class,
        Reservation::class => ReservationPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
