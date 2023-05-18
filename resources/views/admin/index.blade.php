@extends('layouts.master')

@section('title', "admin")

@section('content')
<div class="mb-5">
  <h1>Admin</h1>
  @if (session('message'))
  <div class="alert alert-info">{{ session('message') }}</div>
  @endif
</div>
<div>
  <div class="d-flex justify-content-between">
    <div class="mb-5">
      <form action="{{route('cms.admin.index')}}" method="get">
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
    <div>
      <a href="{{route('cms.admin.create')}}" class="btn btn-primary">create</a>
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
                <a href="{{route('cms.admin.edit', $booking->id)}}" class="btn btn-warning" 
                  @if($booking->status != 'In Proccess') style=" color: #999;cursor: not-allowed;text-decoration: none;" onclick="return false" @endif
                  >Edit</a>
              </div>
              <div>
                <form action="{{route('cms.admin.destroy', $booking->id)}}" method="post">
                  @csrf
                  @method('delete')
                  <button class="btn btn-danger">Hapus</button>
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