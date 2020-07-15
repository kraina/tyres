
<div class="listings_container" id="listings_container">
    <br><br>
    <table class="table" style="margin: auto; width: 80% ">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Тип Траспортного Средства</th>
            <th scope="col">Производитель</th>
            <th scope="col">Модель Транспортного Средства</th>
            <th scope="col">Размер Шины</th>
            <th scope="col">Модель Шины</th>
            <th scope="col">Производитель Шин</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tyres as $tyre)
        <tr>
            <th scope="row">{{ $tyre->id }}</th>
            <td >{{ $tyre->vehicle_type }}</td>
            <td>{{ $tyre->vehicle_manufacturer }}</td>
            <td>{{ $tyre->vehicle_model }}</td>
            <td>{{ $tyre->tyre_size }}</td>
            <td>{{ $tyre->tyre_model }}</td>
            <td>{{ $tyre->tyre_manufacturer }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
