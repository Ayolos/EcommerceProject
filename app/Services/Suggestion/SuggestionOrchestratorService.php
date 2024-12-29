<?php

namespace App\Services\Suggestion;

use App\Contracts\SuggestionContract;

class SuggestionOrchestratorService implements SuggestionContract
{
    public function __construct(private array $searchService)
    {}

    public function suggest($search)
    {
        $results = [];

        foreach ($this->searchService as $service) {
            $results[get_class($service)] = $service->suggest($search);
        }

        return collect($results)->flatten();
    }
}
