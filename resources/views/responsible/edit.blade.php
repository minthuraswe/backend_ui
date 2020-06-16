@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row p-4 mt-2">
            <div class="col-md-12">
                <div class="d-flex">
                    <div><h2>Editing Position</h2></div>
                </div>
                <div class="card">
                    <form action="{{url('responsible/' . $responsible->id )}}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group row mt-3">
                            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Create New Position') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{$responsible->res_name}}" required>
                            @if(session('error'))
                            <span class="text-danger font-weight-bold">
                                {{session('error')}}
                            </span>
                            @endif
                            @if(session('errorposition'))
                            <span class="text-danger font-weight-bold">
                                {{session('errorposition')}}
                            </span>
                            @endif
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success mr-2">Update</button>
                            <a href="{{url('/responsible')}}" class="btn btn-secondary">Cancel</a>
                        </div>    
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection