<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Styles -->
       <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style type="text/css">
            .box{
                width:600px;
                margin:0 auto;
                border:1px solid #ccc;
            }
        </style>
    </head>
    <body>
        <div class="container box" id="container-id">
            <h3 align="center">Ajax Dynamic Dependent Dropdown in Laravel</h3><br />
            <div class="form-group">
                <select name="vendor" id="vendor" class="form-control input-lg dynamic" >
                    <option value="">Select Vendor</option>
                    @foreach($select_tyres as $select_tyre)
                        @if(!empty($select_tyre->vendor))
                        <option value="{{ $select_tyre->vendor}}">{{ $select_tyre->vendor }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <button class="btn btn-success" id="search_button">Submit</button>
            {{ csrf_field() }}
            <br />
            <br />
        </div>
        <div class="listings_container" id="listings_container">

        </div>
        <script>
            $(document).ready(function(){
                function delete_prev_selected_index_0(current_select){
                    delete_prev_select(current_select);
                    $(document).one('change', '.dynamic', function (e) {
                        if($(this).prop('selectedIndex') > 0) {
                            let select_0 = $(this).prop('selectedIndex');
                            // e.preventDefault();
                            // $(this).unbind();
                            // $(this).bind('change');
                            add_select();
                        }
                    });
                }

                function delete_prev_select(current_index_id){
                    var dependents_array = ["vendor", "car", "year", "modification", "pcd", 'diametr', 'gaika', 'zavod_shini', 'zamen_shini', 'tuning_shini', 'zavod_diskov', 'zamen_diskov', 'tuning_diski'];
                    var dependents_array_length = dependents_array.length;
                    var current_index = dependents_array.indexOf(current_index_id);
                    var dependent_lenght;
                    var i;
                    var ii;
                    var next_dependent;

                    if (current_index === 0) {
                        for (i = 1; i <= Number(dependents_array_length); i++) {
                            next_dependent = $("#" + dependents_array[Number(current_index) + Number(i)]);
                            next_dependent.unwrap();
                            next_dependent.remove();
                            dependent_lenght = next_dependent.length;
                        }
                    }
                    else{
                        for (ii = Number(current_index)+1; ii <= Number(dependents_array_length)+1; ii++) {
                            next_dependent = $("#" + dependents_array[Number(ii)]);
                            next_dependent2 = next_dependent.attr("id");
                            next_dependent.unwrap();
                            next_dependent.remove();
                            dependent_lenght = next_dependent.length;

                        }
                    }
                    return dependent_lenght;
                }
                function add_select(){
                    if($('.dynamic').val() !== '')
                    {
                        let vendor = $("#vendor").val();
                        let car = $("#car").val();
                        let year = $("#year").val();
                        let modification = $("#modification").val();
                        let pcd = $("#pcd").val();
                        let diametr = $("#diametr").val();
                        let gaika = $("#gaika").val();
                        var zavod_shini = $("#zavod_shini").val();
                        var zamen_shini = $("#zamen_shini").val();
                        var tuning_shini = $("#tuning_shini").val();
                        var zavod_diskov = $("#zavod_diskov").val();
                        var zamen_diskov = $("#zamen_diskov").val();
                        var tuning_diski = $("#tuning_diski").val();

                        var _token = $('input[name="_token"]').val();
                        $.ajax({
                            url: "{{ route('index.fetch') }}",
                            method: "POST",
                            data: {
                                _token: _token,
                                vendor: vendor,
                                car: car,
                                year: year,
                                modification: modification,
                                pcd: pcd,
                                diametr: diametr,
                                gaika: gaika,
                                zavod_shini: zavod_shini,
                                zamen_shini: zamen_shini,
                                tuning_shini: tuning_shini,
                                zavod_diskov: zavod_diskov,
                                zamen_diskov: zamen_diskov,
                                tuning_diski: tuning_diski
                            },
                            success: function (result) {
                                //alert(result);
                                //console.log(result);
                                var result1 = $.trim(result);
                                var n = result1.length;
                                if (n === 5) {
                                    search_tyres();
                                }

                                $("#search_button").before(result);

                                    let change = false;
                                    let select_added = false;

                                    $(document).one("change", '.dynamic', function (e) {
                                        e.preventDefault();
                                        $(this).unbind();
                                        $(this).bind('change');
                                        //console.log($(this).prop('selectedIndex'));

                                        if($(this).prop('selectedIndex') === 0){
                                            dependent_lenght = delete_prev_selected_index_0($(this).attr("id"));
                                        }else {
                                            dependent_lenght = delete_prev_select($(this).attr('id'));
                                            if (change === false) {
                                                add_select();
                                                change = true;
                                            }
                                        }
                                    });
                                if($(this).attr('id') !== '' && $(this).attr('id') === true && typeof $(this).attr('id') !== "undefined" && change === false && select_added === false){
                                    add_select();
                                    select_added = true;
                                }
                            }
                        })
                    }
                }
                function search_tyres(){
                    var vendor = $("#vendor").val();
                    var car = $("#car").val();
                    var year = $("#year").val();
                    var modification = $("#modification").val();
                    var pcd = $("#pcd").val();
                    var diametr = $("#diametr").val();
                    var gaika = $("#gaika").val();
                    var zavod_shini = $("#zavod_shini").val();
                    var zamen_shini = $("#zamen_shini").val();
                    var tuning_shini = $("#tuning_shini").val();
                    var zavod_diskov = $("#zavod_diskov").val();
                    var zamen_diskov = $("#zamen_diskov").val();
                    var tuning_diski = $("#tuning_diski").val();
                    var _token = $('input[name="_token"]').val();


                    $.ajax({
                        type: 'get',
                        /*headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},*/
                        dataType: 'html',
                        url: "{{route('ajax_listings')}}",
                        ifModified: true,
                        cache: false,
                        data: {vendor: vendor, car: car, year: year, modification: modification, pcd: pcd, diametr: diametr, gaika: gaika, zavod_shini: zavod_shini, zamen_shini: zamen_shini, tuning_shini: tuning_shini, zavod_diskov: zavod_diskov, zamen_diskov: zamen_diskov, tuning_diski: tuning_diski, _token: _token},
                        _token: _token,
                        success: function(response){
                            //alert(response);
                            //$.getScript("{\{asset('js/listings.js')}}");
                            $('#listings_container').replaceWith(response);
                        }
                    });
                }
                $( document ).one( "change", "#vendor", add_select);

                $('#search_button').click(function(){
                        search_tyres();
                });
            });
        </script>
    </body>
</html>
