@extends('layouts.master')

@section('title', "Dashboard")

@section('content')

<div class="row">
  <div class="mb-5">
    <div class="p-2 text-center">
      <h5>Vehicle</h5>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">type</th>
          <th scope="col">status</th>
          <th scope="col">fuel consumtion</th>
          <th scope="col">service schedule</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($vehicles as $vehicle)
        <tr>
          <th scope="row">{{$loop->iteration}}</th>
          <td>{{$vehicle->type}}</td>
          <td>@if(isset($vehicle->vehicleUsage)) Not Available @else Available @endif</td>
          <td>{{$vehicle->fuel_consumption}} liter</td>
          <td>{{$vehicle->service_schedule}} </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="col-md-6">
    <canvas id="vehicleChart"></canvas>
  </div>
  <div class="col-md-6">
    <div>
      <div class="p-2 text-center">
        <h5>Driver</h5>
      </div>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">status</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($drivers as $driver)
          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$driver->name}}</td>
            <td>@if(isset($driver->driver)) Not Available @else Available @endif</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

</div>


<script>
    var ctx = document.getElementById('vehicleChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Digunakan', 'Tidak Digunakan'],
            datasets: [{
                label: 'Status Kendaraan',
                data: [{{ count($usedVehicles) }}, {{ $unusedVehicles }}],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
</script>
@endsection