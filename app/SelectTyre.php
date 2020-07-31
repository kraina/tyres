<?php

namespace App;

use App\Models\Filters\SelectTyres\SelectTyreSearch;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class SelectTyre extends Model
{
    public function getSelectTyresBySearch(Request $request):Builder
    {
        $builder = (new SelectTyreSearch())->apply($request);
        return $builder;
    }
}
