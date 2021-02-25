
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
                <div class="uper">
              @if(session()->get('success'))
                <div class="alert alert-success">
                  {{ session()->get('success') }}  
                </div>
                
                <br />
              @endif

              <div>
              Employee List
              <a class="btn btn-primary float-right" href="{{ route('employees.create')}}">Create</a> 
              </div>
              <table class="table table-striped">
                <thead>
                    <tr>
                      <td>ID</td>
                      <td>Name</td>
                      <td>Email</td>
                      <td>Salary</td>   
                      <td colspan="2">Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $employee)
                            <tr>
                                <td>{{$employee->id}}</td>
                                <td>{{$employee->name}}</td>
                                <td>{{$employee->email}}</td>
                                <td>{{number_format($employee->salary,2)}}</td>
                                <td><a href="{{ route('employees.edit', $employee->id)}}" class="btn btn-primary">Edit</a></td>
                                <td>
                                    <form action="{{ route('employees.destroy', $employee->id)}}" method="post">
                                      @csrf
                                      @method('DELETE')
                                      <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                    <div>

            </div>
        </div>
    </div>
</div>
        @endsection

