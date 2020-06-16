@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row p-4 mt-2">
        <div class="col-md-12">
            <div class="d-flex">
                <div>
                    <h2>Adding Photo</h2>
                </div>
                <div class="ml-auto">
                    <a href="{{url('/photo')}}" class="btn btn-primary mb-3 p-2">Back</a>
                </div>
            </div>

            <div class="card">
                <form action="{{url('/photo')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row mt-3">
                        <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Name') }}</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="name" placeholder="Photo Name" value="{{old('name')}}">
                            
                            @if($errors->has('name'))
                            <span class="text-danger font-weight-bold">
                                {{$errors->first('name')}}
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="text" class="col-md-2 col-form-label text-md-right">{{ __('Photo') }}</label>
                        <div class="col-md-8">
                            <input type="file" class="form-control " id="validatedCustomFile" name="photo" >
                            @if($errors->has('photo'))
                            <span class="text-danger font-weight-bold">
                                {{$errors->first('photo')}}
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="email"
                            class="col-md-2 col-form-label text-md-right">{{ __('Category') }}</label>
                        <div class="col-md-8">
                            <select name="category" id="" class="form-control">
                                <option value="">Choose One</option>
                                <option {{old('category') == 'Activity' ? "selected" : ''}}>Activity</option>
                                <option {{old('category') == 'Member' ? "selected" : ''}}>Member</option>
                                <option {{old('category') == 'Post' ? "selected" : ''}}>Post</option>
                            </select>
                            @if($errors->has('category'))
                            <span class="text-danger font-weight-bold">
                                {{$errors->first('category')}}
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="row form-group mt-3 justify-content-center">
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
