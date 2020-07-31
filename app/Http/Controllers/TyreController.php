<?php

namespace App\Http\Controllers;

use App\Tyre;
use Illuminate\Http\Request;

class TyreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tyres = Tyre::select('vehicle_type')->groupBy('vehicle_type')->get()->all();
        return view('index2')->with('tyres', $tyres);

        //return view('index', compact('vehicle_types', 'vehicle_manufacturers', 'vehicle_models', 'tyre_sizes', 'tyre_models', 'tyre_manufacturers'));
    }
/*
    function index()
    {
        $tyres = VehicleType::get()->all();
        return view('index')->with('tyres', $tyres);
    }
*/
    function fetch(Request $request)
    {
        $parent_key = $request->get('parent_key');
        $parent_value = $request->get('parent_value');
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = Tyre::select($dependent)
            ->where($parent_key, $parent_value)
            ->where($select, $value)
            ->groupBy($dependent)
            ->get();
        $output = '<option value="">Select '.str_replace('_', ' ', ucfirst($dependent)).'</option>';
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
        }
        echo $output;
    }
    public function ajax_listings(Request $request, Tyre $tyre){
        if(request()->ajax()) {
            //if(!empty($request->rooms)&&!empty($request->property_type)&&!empty($request->location)) {
                //if ($request->rooms === "ALL"&&$request->property_type === "ALL"&&$request->location === "ALL") {
                    //$tyres = Tyre::select('vehicle_type')->groupBy('vehicle_type')->get()->all();
            $tyres = $tyre->getTyresBySearch($request)->get();

                    return view('layouts.ajax_listings2', ['tyres' => $tyres]);
               // }
              //  $properties = $property->getPropertiesBySearch($request)->orderBy('created_at', 'desc')->get();
              //  return view('layouts.ajax_listing', ['properties' => $properties]);
           // }
        }
        //$properties = $property->getPropertiesBySearch($request)->orderBy('created_at', 'desc')->get();
       // return view('listings', ['properties' => $properties]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tyre  $tyre
     * @return \Illuminate\Http\Response
     */
    public function show(Tyre $tyre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tyre  $tyre
     * @return \Illuminate\Http\Response
     */
    public function edit(Tyre $tyre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tyre  $tyre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tyre $tyre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tyre  $tyre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tyre $tyre)
    {
        //
    }
}
