<?php

namespace App\Providers;

use App\Models\Car;
use App\Models\City;
use App\Models\Comment;
use App\Policies\CarPolicy;
use App\Policies\CityPolicy;
use App\Policies\CommentPolicy;
use App\Policies\PostPolicy;
use App\Policies\TripPolicy;
use App\Policies\UserPolicy;
use App\Models\Post;
use App\Models\Trip;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        Trip::class => TripPolicy::class,
        Post::class => PostPolicy::class,
        Comment::class => CommentPolicy::class,
        User::class => UserPolicy::class,
        City::class => CityPolicy::class,
        Car::class => CarPolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();

        //
    }
}
