@extends('layouts.master')

@section('title', "Dashboard")

@section('content')

<canvas id="vehicleChart"></canvas>

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