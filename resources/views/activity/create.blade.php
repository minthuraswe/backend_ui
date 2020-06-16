@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row p-4 mt-2">
        <div class="col-md-12">
            <div class="d-flex">
                <div>
                    <h2>Creating Activity</h2>
                </div>
                <div class="ml-auto">
                    <a href="{{url('/activity')}}" class="btn btn-primary mb-3 p-2">Back</a>
                </div>
            </div>
            <div class="card">
                <form action="{{url('/activity')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row mt-3">
                        <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Name') }}</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="name" placeholder="Activity Name"
                                value="{{old('name')}}">
                            @if($errors->has('name'))
                            <span class="text-danger font-weight-bold">
                                {{$errors->first('name')}}
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('Photo') }}</label>
                        <div class="col-md-8">
                            <select name="photo" id="" class="form-control">
                                <option value=""> Select Photo</option>
                                @foreach ($photo as $item)
                                @if($item->photo_for_what == 'Activity')
                                @if(Request::old('photo') == $item->id)
                                <option value="{{$item->id}}" selected>{{$item->photo_name}}</option>
                                @else
                                <option value="{{$item->id}}">{{$item->photo_name}}</option>
                                @endif
                                @endif
                                @endforeach
                            </select>
                            @if($errors->has('photo'))
                            <span class="text-danger font-weight-bold">
                                {{$errors->first('photo')}}
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('Category') }}</label>
                        <div class="col-md-8">
                            <select name="category" id="" class="form-control">
                                <option value=""> Select Category</option>
                                @foreach ($cat as $item)
                                @if(Request::old('category') == $item->id)
                                <option value="{{$item->id}}" selected>{{$item->cat_name}}</option>
                                @else
                                <option value="{{$item->id}}">{{$item->cat_name}}</option>
                                @endif
                                @endforeach
                            </select>
                            @if($errors->has('category'))
                            <span class="text-danger font-weight-bold">
                                {{$errors->first('category')}}
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="text" class="col-md-2 col-form-label text-md-right">{{ __('Image') }}</label>
                        <div class="col-md-8">
                            <input type="file" class="form-control" name="memory[]" multiple>
                            @if($errors->has('memory'))
                            <span class="text-danger font-weight-bold">
                                {{$errors->first('memory')}}
                            </span>
                            @endif
                            @if($errors->has('memory.*'))
                            <span class="text-danger font-weight-bold">
                                {{$errors->first('memory.*')}}
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