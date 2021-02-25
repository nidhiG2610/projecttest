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
                        Add New Employe

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
                          <form method="post" action="{{ route('employees.store') }}">
                              <div class="form-group">
                                  @csrf
                                  <label for="name">Employee Name:</label>
                                  <input type="text" class="form-control" name="name"/>
                              </div>
                              <div class="form-group">
                                  <label for="email">Email :</label>
                                  <input type="text" class="form-control" name="email"/>
                              </div>
                              <div class="form-group">
                                  <label for="salary">Employee Salary :</label>
                                  <input type="text" class="form-control" name="salary"/>
                              </div>
                              <button type="submit" class="btn btn-primary">Save Employe</button>
                          </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
