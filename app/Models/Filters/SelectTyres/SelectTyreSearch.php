<?php


namespace App\Models\Filters\SelectTyres;

use App\SelectTyre;
use App\Services\Filters\BaseSearch;
use App\Services\Filters\Searchable;

class SelectTyreSearch implements Searchable
{
    const MODEL = SelectTyre::class;
    use BaseSearch;
}
