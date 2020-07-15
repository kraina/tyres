<?php


namespace App\Models\Filters\Tyres;


use App\Tyre;
use App\Services\Filters\BaseSearch;
use App\Services\Filters\Searchable;

class TyreSearch implements Searchable
{
    const MODEL = Tyre::class;
    use BaseSearch;
}
