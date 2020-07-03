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
        <div class="container box">
            <h3 align="center">Ajax Dynamic Dependent Dropdown in Laravel</h3><br />
            <div class="form-group">
                <select name="vehicle_type" id="vehicle_type" class="form-control input-lg dynamic" data-dependent="vehicle_manufacturer">
                    <option value="">Select Vehicle Type</option>
                    @foreach($tyres as $tyre)
                        @if(!empty($tyre->vehicle_type))
                        <option value="{{ $tyre->vehicle_type}}">{{ $tyre->vehicle_type }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <br />
            <div class="form-group">
                <select name="vehicle_manufacturer" id="vehicle_manufacturer" class="form-control input-lg dynamic" data-dependent="vehicle_model">
                    <option value="">Select Vehicle Manufacturer</option>
                </select>
            </div>
            <br />
            <div class="form-group">
                <select name="vehicle_model" id="vehicle_model" class="form-control input-lg dynamic" data-dependent="tyre_size">"
                    <option value="">Select Vehicle Model</option>
                </select>
            </div>
            <div class="form-group">
                <select name="tyre_size" id="tyre_size" class="form-control input-lg dynamic" data-dependent="tyre_model">
                    <option value="">Select Tyre Size</option>
                </select>
            </div>
            <div class="form-group">
                <select name="tyre_model" id="tyre_model" class="form-control input-lg dynamic" data-dependent="tyre_manufacturer">
                    <option value="">Select Tyre Model</option>
                </select>
            </div>
            <div class="form-group">
                <select name="tyre_manufacturer" id="tyre_manufacturer" class="form-control input-lg">
                    <option value="">Select Tyre Manufacturer</option>
                </select>
            </div>
            {{ csrf_field() }}
            <br />
            <br />
        </div>
        <script>
            $(document).ready(function(){

                $('.dynamic').change(function(){
                    if($(this).val() != '')
                    {
                        var select = $(this).attr("id");
                        var value = $(this).val();
                        var dependent = $(this).data('dependent');
                        var _token = $('input[name="_token"]').val();
                        $.ajax({
                            url:"{{ route('index.fetch') }}",
                            method:"POST",
                            data:{select:select, value:value, _token:_token, dependent:dependent},
                            success:function(result)
                            {
                                $('#'+dependent).html(result);
                            }

                        })
                    }
                });

                $('#country').change(function(){
                    $('#state').val('');
                    $('#city').val('');
                });

                $('#state').change(function(){
                    $('#city').val('');
                });
            });
        </script>
    </body>
</html>
