@extends('dashboard')
@section('content')
    <div class="container">
        <div class="row p-4 mt-2">
            <div class="col-md-12">
                <div class="d-flex">
                    <div><h2>Creating Post</h2></div>
                    <div class="ml-auto">
                        <a href="{{url('/post')}}" class="btn btn-primary mb-3 p-2 ">Click Here To Go Back</a>
                    </div>
                </div>
                <div class="card">
                    <form action="{{url('/post')}}" method="post">
                        @csrf
                            <div class="form-group row mt-3">
                                <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Post Title') }}</label>
                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="post_title" placeholder="Post Title" required>
                            </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('Photo') }}</label>
                                <div class="col-md-6">
                                <select name="photo_id" id="" class="form-control"  required >
                                    <option> Select Photo</option>
                                     @foreach ($photo as $item)
                                     @if($item->photo_for_what == 'News')
                                        <option value="{{$item->id}}">{{$item->photo_name}}</option>
                                     @endif                               
                                     @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('Category') }}</label>
                                <div class="col-md-6">
                                <select name="cat_id" id="" class="form-control"  required >
                                    <option> Select Category</option>
                                     @foreach ($cat as $item)
                                        <option value="{{$item->id}}">{{$item->cat_name}}</option>
                                     @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="text" class="col-md-3 col-form-label text-md-right">{{ __('Description') }}</label>
                            <div class="col-md-6">
                                <textarea  rows="10" class="form-control" name="post_description" placeholder="Post Description" required></textarea>
                            </div>
                            </div>
                            <div class="row form-group mt-3 justify-content-center">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection