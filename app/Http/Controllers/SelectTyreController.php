<?php

namespace App\Http\Controllers;

use App\SelectTyre;
use Illuminate\Http\Request;

class SelectTyreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $select_tyres = SelectTyre::select('vendor')->groupBy('vendor')->get()->all();
        return view('index')->with('select_tyres', $select_tyres);
    }

    private function get_dependent($request_array, $dependent){

        $data = SelectTyre::select($dependent, SelectTyre::raw('count(*) as total, '.$dependent))
            ->where(function($query) use ($request_array){
                foreach($request_array as $request_key =>$request_value){
                    $query->where($request_key, $request_value);
                }
            })
            ->groupBy($dependent)
            ->get();
        //dd($data);
        if(count($data) > 0) {
            return $data;
        }
    }
    private function output_dependent($data, $dependent){
        $output = '<div class="form-group">
                <select name="' . $dependent . '" id="' . $dependent . '" class="form-control input-lg dynamic" >
                    <option value="">Select ' . str_replace('_', ' ', ucfirst($dependent)) . '</option>';
        foreach ($data as $row) {
            if (strlen($row->$dependent) > 0) {
                $output .= '<option value="' . $row->$dependent . '">' . $row->$dependent . '</option>';
            } else {
                $output .= '<option value="' . $dependent . '">нет</option>';
            }
        }

        $output .= '</select></div>';
        $output_array[$dependent] = $output;
        echo $output_array[$dependent];
    }
    function fetch(Request $request)
    {

        $request_array = array(
            "vendor"        =>$request->vendor,
            "car"           =>$request->car,
            "year"          =>$request->year,
            'modification'  =>$request->modification,
            'pcd'           =>$request->pcd,
            'diametr'       =>$request->diametr,
            'gaika'         =>$request->gaika,
            'zavod_shini'   =>$request->zavod_shini,
            'zamen_shini'   =>$request->zamen_shini,
            'tuning_shini'  =>$request->tuning_shini,
            'zavod_diskov'  =>$request->zavod_diskov,
            'zamen_diskov'  =>$request->zamen_diskov,
            'tuning_diski'  =>$request->tuning_diski

        );
        $request_array = array_filter($request_array);
        /*

        $parent_key = $request->get('parent_key');
        $parent_value = $request->get('parent_value');
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        */
        $select_array = [
            "vendor",
            "car",
            "year",
            'modification',
            'pcd',
            'diametr',
            'gaika',
            'zavod_shini',
            'zamen_shini',
            'tuning_shini',
            'zavod_diskov',
            'zamen_diskov',
            'tuning_diski'

        ];
       $x = array_search(array_key_last($request_array),$select_array);
        if(array_key_last($request_array) !== 'tuning_diski') {
            $dependent = $select_array[$x + 1];
            $request_array = array_filter($request_array);
            $data = $this->get_dependent($request_array, $dependent);
            $count_data = count($data);
            if($count_data === 1){
                $x = $x + 2;
                foreach ($data as $row1) {
                    if ($row1->total > 1) {
                        if (($row1->$dependent === "" || is_null($row1->$dependent)) && $dependent !== 'tuning_diski') {
                            $dependent = $select_array[$x];
                            foreach ($select_array as $key_array => $dependent) {
                                if ($key_array >= $x) {
                                    $data = $this->get_dependent($request_array, $dependent);
                                    foreach ($data as $row2) {
                                        if (!empty($row2->$dependent)) {
                                            $output_dependent_array[$dependent] = $data;
                                        }
                                    }
                                    $x++;
                                }
                            }
                        } else if (strlen($row1->$dependent) > 0) {
                            $output_dependent_array[$dependent] = $data;
                        }
                    }
                    else{
                        $end_dependent = "&shy;";
                        return $end_dependent;
                    }
                }
            }else {
                $output_dependent_array[$dependent] = $data;
            }
            if(isset($output_dependent_array)) {
                $dependent = array_keys($output_dependent_array)[0];
                $data = $output_dependent_array[$dependent];
                $this->output_dependent($data, $dependent);
            }
        }
    }
    public function ajax_listings(Request $request, SelectTyre $select_tyre){
        if(request()->ajax()) {
            $select_tyres = $select_tyre->getSelectTyresBySearch($request)->get();
            return view('layouts.ajax_listings', ['select_tyres' => $select_tyres]);
        }
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
     * @param  \App\SelectTyre  $selectTyre
     * @return \Illuminate\Http\Response
     */
    public function show(SelectTyre $selectTyre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SelectTyre  $selectTyre
     * @return \Illuminate\Http\Response
     */
    public function edit(SelectTyre $selectTyre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SelectTyre  $selectTyre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SelectTyre $selectTyre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SelectTyre  $selectTyre
     * @return \Illuminate\Http\Response
     */
    public function destroy(SelectTyre $selectTyre)
    {
        //
    }
}
