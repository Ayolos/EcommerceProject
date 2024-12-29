<?php

namespace App\Contracts;

interface SuggestionContract
{
    public function suggest($search);
}
