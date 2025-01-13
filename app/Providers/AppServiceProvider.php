<?php

namespace App\Providers;

use App\Contracts\SuggestionContract;
use App\Models\Cart;
use App\Observers\CartObserver;
use App\Services\Search\SearchCategoryService;
use App\Services\Search\SearchOrchestratorService;
use App\Services\Search\SearchProductService;
use App\Services\Suggestion\SuggestionCategoryService;
use App\Services\Suggestion\SuggestionOrchestratorService;
use App\Services\Suggestion\SuggestionProductService;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;
use App\Contracts\SearchContract;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        //Cart::observe(CartObserver::class);
        JsonResource::withoutWrapping();
    }
}
