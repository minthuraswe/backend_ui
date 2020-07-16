@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row p-4 mt-2">
            <div class="col-md-12">
                <h2>Editing Category</h2>
                <div class="card">
                    <form action="{{url('category/' . $cat->id )}}" method="post" accept-charset="UTF-8">
                        @method('PUT')
                        @csrf
                            <div class="form-group row mt-3">
                                <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Create New Category') }}</label>
    
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$cat->cat_name}}" required>
                                @if(session('error'))
                                <span class="text-danger font-weight-bold">
                                    {{session('error')}}
                                </span>
                                @endif
                                @if(session('errorcategory'))
                                <span class="text-danger font-weight-bold">
                                    {{session('errorcategory')}}
                                </span>
                                @endif
                            </div>
                            <div>
                                <a href="{{url('/category')}}" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-success mr-2">Update</button>
                            </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection