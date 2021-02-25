
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
              Comapny List
              <a class="btn btn-primary float-right" href="{{ route('companies.create')}}">Create</a> 
              </div>
              <table class="table table-striped">
                <thead>
                    <tr>
                      <td>ID</td>
                      <td> Name</td>
                      <td>Email</td>
                      <td>Logo</td>   
                      <td>Website</td>   
                      <td colspan="2">Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($companies as $company)
                            <tr>
                                <td>{{$company->id}}</td>
                                <td>{{$company->name}}</td>
                                <td>{{$company->email}}</td>
                                <td>
                                @if( ($company->logo) !== null)
                                <img src="{{ asset('/Logo/'.$company->logo) }}" alt="" title="" width="100" height="100">
                                @else
                                 <img src="{{ asset('/asset/myavatar.png') }}" alt="" title="" width="100" height="100">

                                @endif
                          
                                </td>
                                <td><a href="{{ route('companies.edit', $company->id)}}" class="btn btn-primary">Edit</a></td>
                                <td>
                                    <form action="{{ route('companies.destroy', $company->id)}}" method="post">
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

