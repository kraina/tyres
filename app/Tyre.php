<?php

namespace App;

use App\Models\Filters\Tyres\TyreSearch;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Tyre extends Model
{
    public function getTyresBySearch(Request $request):Builder
    {
        $builder = (new TyreSearch())->apply($request);
        return $builder;
    }
}
