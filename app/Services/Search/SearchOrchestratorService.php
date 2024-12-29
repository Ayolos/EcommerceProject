<?php

namespace App\Services\Search;

use App\Contracts\SearchContract;

class SearchOrchestratorService implements SearchContract
{
    public function __construct(private array $searchService)
    {}

    public function search($search)
    {
        $results = [];

        foreach ($this->searchService as $service) {
            $results[get_class($service)] = $service->search($search);
        }

        return $results;
    }
}
