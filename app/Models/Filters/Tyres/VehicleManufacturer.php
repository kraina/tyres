<?php


namespace App\Models\Filters\Tyres;


use App\Services\Filters\Filterable;
use Illuminate\Database\Eloquent\Builder;

class VehicleManufacturer implements Filterable
{

    public static function apply(Builder $builder, $value)
    {
        /*
        if($value === "ALL"){
            return $builder->where("vehicle_manufacturer", "!=", $value);
        }
        */
        /*
        if(!is_array($value)) {
            $value = explode(', ', $value);
        }
        */
        return $builder->where('vehicle_manufacturer', $value);
    }
}
