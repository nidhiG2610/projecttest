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
                Update Company Details

              <a class="btn btn-primary float-right" href="{{ route('companies.index')}}">Back</a>

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

                <form method="post" action="{{ route('companies.update', $company->id) }}" enctype="multipart/form-data">
                      <div class="form-group">
                          @csrf
                          @method('PATCH')
                          <label for="name">Company Name:</label>
                          <input type="text" class="form-control" name="name" value="{{ $company->name }}"/>
                      </div>
                      <div class="form-group">
                          <label for="email">Email:</label>
                          <input type="text" class="form-control" name="email" value="{{ $company->email }}"/>
                      </div>
                      <div class="form-group">
                                  <label for="logo">Company Logo :</label>
                                  <input type="file" name="logo"/>
                      </div>
                      <div class="form-group">
                          <label for="website">Company website:</label>
                          <input type="text" class="form-control" name="website" value="{{ $company->website }}"/>
                      </div>
                      <button type="submit" class="btn btn-primary">Update Company</button>
                  </form>
              </div>
             </div>
        <div>
    <div>
<div>
@endsection
