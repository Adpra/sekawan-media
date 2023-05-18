@extends('layouts.master')

@section('title', "create admin")

@section('content')

<div>
  <div>
    <h2>Create Admin</h2>
  </div>
  <form action="{{route('cms.admin.store')}}" method="POST">
    @csrf
    <div class="mb-3" class="{{ $errors->has('vehicle') ? 'has-error' : '' }}">
        <label for="exampleInputEmail1" class="form-label">Vehicle</label>
          <select class="form-select" aria-label="Default select example" name="vehicle">
            @foreach ($vehicles as $vehicle)
            <option value="{{$vehicle->id}}">{{$vehicle->type}}</option>
            @endforeach
          </select>
          @if ($errors->has('vehicle'))
          <div class="help-block" style="color:rgb(208, 46, 46);">
          {{ $errors->first('vehicle') }}
          </div>
          @endif
    </div>
    <div class="mb-3"  class="{{ $errors->has('user_id') ? 'has-error' : '' }}">
          <label for="exampleInputEmail1" class="form-label">Driver</label>
            <select class="form-select" aria-label="Default select example" name="user_id">
              @foreach ($drivers as $driver)
              <option value="{{$driver->id}}">{{$driver->name}}</option>
              @endforeach
            </select>
            @if ($errors->has('user_id'))
          <div class="help-block" style="color:rgb(208, 46, 46);">
          {{ $errors->first('user_id') }}
          </div>
          @endif
    </div>
    <div class="mb-3" class="{{ $errors->has('approved_by') ? 'has-error' : '' }}">
          <label for="exampleInputEmail1" class="form-label">Approved By</label>
            <select class="form-select" aria-label="Default select example" name="approved_by">
              @foreach ($managers as $manager)
              <option value="{{$manager->id}}">{{$manager->name}}</option>
              @endforeach
            </select>
            @if ($errors->has('approved_by'))
            <div class="help-block" style="color:rgb(208, 46, 46);">
            {{ $errors->first('approved_by') }}
            </div>
            @endif
    </div>
    <div class="mb-3" class="{{ $errors->has('branch_id') ? 'has-error' : '' }}">
      <label for="exampleInputEmail1" class="form-label">Branch Office</label>
        <select class="form-select" aria-label="Default select example" name="branch_id">
          @foreach ($branchs as $branch)
          <option value="{{$branch->id}}">{{$branch->name}}</option>
          @endforeach
        </select>
        @if ($errors->has('branch_id'))
        <div class="help-block" style="color:rgb(208, 46, 46);">
        {{ $errors->first('branch_id') }}
        </div>
        @endif
  </div>
    <div class="mb-3"  class="{{ $errors->has('start_date') ? 'has-error' : '' }}">
        <label for="exampleInputPassword1" class="form-label">Start Date</label>
        <input type="date" class="form-control" id="exampleInputPassword1" name="start_date">
        @if ($errors->has('start_date'))
        <div class="help-block" style="color:rgb(208, 46, 46);">
        {{ $errors->first('start_date') }}
        </div>
        @endif
    </div>
    <div class="mb-3" class="{{ $errors->has('end_date') ? 'has-error' : '' }}">
      <label for="exampleInputPassword1" class="form-label">End Date</label>
      <input type="date" class="form-control" id="exampleInputPassword1" name="end_date">
      @if ($errors->has('end_date'))
      <div class="help-block" style="color:rgb(208, 46, 46);">
      {{ $errors->first('end_date') }}
      </div>
      @endif
    </div>
    <div class="d-flex">
      <div class="mr-2">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      <div>
        <a href="{{route('cms.admin.index')}}" class="btn btn-warning">Back</a>
      </div>
    </div>
  </form>
</div>

@endsection