<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Vite;
use Illuminate\Foundation\Application;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Algolia\AlgoliaSearch\RecommendClient;

class AppServiceProvider extends ServiceProvider
{
    public function register() : void
    {
        // This is registered in the container because I swap
        // it up during testing to avoid real API calls.
        $this->app->bind(RecommendClient::class, fn (Application $app) => RecommendClient::create(
            $app['config']->get('scout.algolia.id'),
            $app['config']->get('scout.algolia.secret')
        ));
    }

    public function boot() : void
    {
        Model::preventAccessingMissingAttributes(! app()->isProduction());

        Model::unguard();

        // This categories variable I pass in this view composer is also used in the blog's navigation.
        View::composer(['components.navigation', 'home'], function ($view) {
            static $categories;

            // If the static variable declared above has already been set, use it. Otherwise, set it.
            // This prevents the query from being run multiple times on the same request.
            $categories ??= Category::query()
                ->whereHas('posts')
                ->orderBy('is_highlighted', 'desc')
                ->orderBy('name')
                ->get();

            $view->with(compact('categories'));
        });

        Vite::useScriptTagAttributes([
            'defer' => true,
        ]);
    }
}
