<?php

namespace App\Providers;

use App\Contracts\SuggestionContract;
use App\Services\Search\SearchCategoryService;
use App\Services\Search\SearchOrchestratorService;
use App\Services\Search\SearchProductService;
use App\Services\Suggestion\SuggestionCategoryService;
use App\Services\Suggestion\SuggestionOrchestratorService;
use App\Services\Suggestion\SuggestionProductService;
use Illuminate\Support\ServiceProvider;
use App\Contracts\SearchContract;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Search Services
        $searchServices = [
            app(SearchProductService::class),
            app(SearchCategoryService::class),
        ];

        $this->app->bind(SearchContract::class, function ($app) use ($searchServices) {
            return new SearchOrchestratorService($searchServices);
        });

        // Suggestion Services
        $suggestionServices = [
            app(SuggestionCategoryService::class),
            app(SuggestionProductService::class),
        ];

        $this->app->bind(SuggestionContract::class, function ($app) use ($suggestionServices) {
            return new SuggestionOrchestratorService($suggestionServices);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
