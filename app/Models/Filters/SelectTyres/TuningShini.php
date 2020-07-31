<?php


namespace App\Models\Filters\SelectTyres;

use App\Services\Filters\Filterable;
use Illuminate\Database\Eloquent\Builder;

class TuningShini implements Filterable
{

    public static function apply(Builder $builder, $value)
    {
        /*
        if($value === "ALL"){
            return $builder->where("vehicle_type", "!=", $value);
        }
        */
        /*
        if(!is_array($value)) {
            $value = explode(', ', $value);
        }
        */
        return $builder->where('tuning_shini', $value);
    }
}
