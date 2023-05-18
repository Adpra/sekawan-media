@extends('layouts.master')

@section('title', "manager")

@section('content')

<div class="mb-5">
  <h2>Manager</h2>

  @if (session('message'))
  <div class="alert alert-info">{{ session('message') }}</div>
  @endif
</div>
<div>
  <div class="d-flex justify-content-between">
    <div class="mb-5">
      <form action="{{route('cms.manager.index')}}" method="get">
        @csrf
        <div class="d-flex">
          <div class="mr-3">
            <select class="form-select" aria-label="Default select example" name="filter">
              @foreach ($statuses as $status)
                <option {{ request()->filter == $status ? 'selected' : '' }}>{{$status}}</option>
              @endforeach
            </select>          
          </div>
          <div>
            <button class="btn btn-primary" type="submit" >
              Filter
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <div class="">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Vehicle</th>
          <th scope="col">Driver</th>
          <th scope="col">Approved By</th>
          <th scope="col">Start Date</th>
          <th scope="col">End Date</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($bookings as $booking)
        <tr>
          <th scope="row">{{$loop->iteration}}</th>
          <td>{{$booking->vehicle->type ?? '-'}}</td>
          <td>{{$booking->driver->name ?? '-'}}</td>
          <td>{{$booking->approvedBy->name ?? '-'}}</td>
          <td>{{$booking->start_date ?? '-'}}</td>
          <td>{{$booking->end_date ?? '-'}}</td>
          <td>{{$booking->status ?? '-'}}</td>
          <td>
            <div class="d-flex">
              <div class="mr-2">
                <form action="{{route('cms.manager.update', $booking->id)}}" method="post">
                  @csrf
                  @method('put')
                  <input type="hidden" name="approve" value="Approved">
                  <input type="hidden" name="vehicle_id" value="{{$booking->vehicle_id}}">
                  <input type="hidden" name="user_id" value="{{$booking->user_id}}">
                  <button class="btn btn-success" {{$booking->status != 'In Proccess' ? 'disabled': ''}}>Approve</button>
                </form>
              </div>
              <div>
                <form action="{{route('cms.manager.update', $booking->id)}}" method="post">
                  @csrf
                  @method('put')
                  <input type="hidden" name="cancel" value="Canceled">
                  <button class="btn btn-danger" {{$booking->status != 'In Proccess' ? 'disabled': ''}}>Cancel</button>
                </form>
              </div>
            </div>
          </td>
        </tr>
          @empty
          <table>
            <thead>
              <tbody>
                <tr>
                  <div class="text-center">No Data</div>
                </tr>
              </tbody>
            </thead>
          </table>
          @endforelse
      </tbody>
    </table>
    <div>
      {{ $bookings->links() }}
    </div>
</div>


@endsection