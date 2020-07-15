<?php


namespace App\Models\Filters\Properties;


use App\Property;
use App\Services\Filters\BaseSearch;
use App\Services\Filters\Searchable;

class PropertySearch implements Searchable
{
    const MODEL = Property::class;
    use BaseSearch;
}
