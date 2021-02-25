@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card uper">
              <div class="card-header">
                Update Employees

              <a class="btn btn-primary float-right" href="{{ route('employees.index')}}">Back</a>

              </div>
              <div class="card-body">
                @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                  </div><br />
                @endif

                <form method="post" action="{{ route('employees.update', $employee->id) }}">
                      <div class="form-group">
                          @csrf
                          @method('PATCH')
                          <label for="name">Show Name:</label>
                          <input type="text" class="form-control" name="name" value="{{ $employee->name }}"/>
                      </div>
                      <div class="form-group">
                          <label for="price">Show Genre :</label>
                          <input type="text" class="form-control" name="email" value="{{ $employee->email }}"/>
                      </div>
                      <div class="form-group">
                          <label for="price">Show IMDB Rating :</label>
                          <input type="text" class="form-control" name="salary" value="{{ number_format($employee->salary, 2) }}"/>
                      </div>
                      <button type="submit" class="btn btn-primary">Update Show</button>
                  </form>
              </div>
             </div>
        <div>
    <div>
<div>
@endsection
