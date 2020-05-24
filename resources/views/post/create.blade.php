@extends('dashboard')
@section('content')
<div class="container">
    <div class="row p-4 mt-2">
        <div class="col-md-12">
            <div class="d-flex">
                <div>
                    <h2>Creating Post</h2>
                </div>
                <div class="ml-auto">
                    <a href="{{url('/post')}}" class="btn btn-primary mb-3 p-2 ">Click Here To Go Back</a>
                </div>
            </div>
            <div class="card">
                <form action="{{url('/post')}}" method="post">
                    @csrf
                    <div class="form-group row mt-3">
                        <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Post Title') }}</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="post" placeholder="Post Title"
                                value="{{old('post')}}">
                            @if($errors->has('post'))
                            <span class="text-danger font-weight-bold">
                                {{$errors->first('post')}}
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
                                @if($item->photo_for_what == 'Post')
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
                        <label for="text" class="col-md-2 col-form-label text-md-right">{{ __('Description') }}</label>
                        <div class="col-md-8">
                            <textarea rows="10" class="form-control summernote" name="description"
                                placeholder="Post Description">{{strip_tags(old('description'))}}</textarea>
                            @if($errors->has('description'))
                            <span class="text-danger font-weight-bold">
                                {{$errors->first('description')}}
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

@push('scripts')
<script>
    $('.summernote').summernote({
        placeholder: 'Post Description',
        tabsize: 2,
        height: 200,
        toolbar: [
    // ['style', ['style']],
    ['font', ['bold', 'underline', 'clear']],
    ['para', ['ul', 'ol']],
    // ['table', ['table']],
    // ['insert', ['picture']],
    ['view', ['fullscreen', 'help']]
        ]
    });
</script>
@endpush