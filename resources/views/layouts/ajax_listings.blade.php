
<div class="listings_container" id="listings_container">
    <br><br>
    <table class="table" style="margin: auto; width: 80% ">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Vendor</th>
            <th scope="col">Car</th>
            <th scope="col">Year</th>
            <th scope="col">Modification</th>
            <th scope="col">PCD</th>
            <th scope="col">Diametr</th>
            <th scope="col">Gaika</th>
            <th scope="col">Zavod Shini</th>
            <th scope="col">Zamen Shini</th>
            <th scope="col">Tuning Shini</th>
            <th scope="col">Zavod Diskov</th>
            <th scope="col">Zamen Diskov</th>
            <th scope="col">Tuning Diski</th>
        </tr>
        </thead>
        <tbody>
        @foreach($select_tyres as $select_tyre)
        <tr>
            <th scope="row">{{ $select_tyre->id }}</th>
            <td >{{ $select_tyre->vendor }}</td>
            <td>{{ $select_tyre->car }}</td>
            <td>{{ $select_tyre->year }}</td>
            <td>{{ $select_tyre->modification }}</td>
            <td>{{ $select_tyre->pcd }}</td>
            <td>{{ $select_tyre->diametr }}</td>
            <td>{{ $select_tyre->gaika }}</td>
            <td>{{ $select_tyre->zavod_shini }}</td>
            <td>{{ $select_tyre->zamen_shini }}</td>
            <td>{{ $select_tyre->tuning_shini }}</td>
            <td>{{ $select_tyre->zavod_diskov }}</td>
            <td>{{ $select_tyre->zamen_diskov }}</td>
            <td>{{ $select_tyre->tuning_diski }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
