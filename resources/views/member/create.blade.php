@extends('dashboard')
@section('content')
<div class="container">
    <div class="row p-4 mt-2">
        <div class="col-md-12">
            <div class="d-flex">
                <div>
                    <h2>Creating Member</h2>
                </div>
                <div class="ml-auto">
                    <a href="{{url('/member')}}" class="btn btn-primary mb-3 p-2">Click Here To Go Back</a>
                </div>
            </div>
            <div class="card">
                <form action="{{url('/member')}}" method="post">
                    @csrf

                    <div class="form-group row mt-3">
                        <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Name') }}</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="name" placeholder="Member Name"
                                value="{{old('name')}}">
                            @if($errors->has('name'))
                            <span class="text-danger font-weight-bold">
                                {{$errors->first('name')}}
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('Email') }}</label>
                        <div class="col-md-8">
                            <input type="email" class="form-control" name="email" placeholder="Member Email"
                                value="{{old('email')}}">
                            @if($errors->has('email'))
                            <span class="text-danger font-weight-bold">
                                {{$errors->first('email')}}
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="text" class="col-md-2 col-form-label text-md-right">{{ __('University') }}</label>
                        <div class="col-md-8">
                            <select name="university" id="" class="form-control">
                                <option value="">Select University</option>
                                @foreach ($uni as $item)
                                @if(Request::old('university') == $item->id)
                                <option value="{{$item->id}}" selected>{{$item->uni_name}}</option>
                                @else
                                <option value="{{$item->id}}">{{$item->uni_name}}</option>
                                @endif
                                @endforeach
                            </select>
                            @if($errors->has('university'))
                            <span class="text-danger font-weight-bold">
                                {{$errors->first('university')}}
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="text" class="col-md-2 col-form-label text-md-right">{{ __('Positon') }}</label>
                        <div class="col-md-8">
                            <select name="position" class="form-control">
                                <option value=""> Select Position</option>
                                @foreach ($res as $data)
                                @if(Request::old('position') == $data->id)
                                <option value="{{$data->id}}" selected>{{$data->res_name}}</option>
                                @else
                                <option value="{{$data->id}}">{{$data->res_name}}</option>
                                @endif
                                @endforeach
                            </select>
                            @if($errors->has('position'))
                            <span class="text-danger font-weight-bold">
                                {{$errors->first('position')}}
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="age" class="col-md-2 col-form-label text-md-right">{{ __('Born') }}</label>
                        <div class="col-md-8">
                            <input type="date" class="form-control" name="age" value="{{old('age')}}">
                            @if($errors->has('age'))
                            <span class="text-danger font-weight-bold">
                                {{$errors->first('age')}}
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="phone" class="col-md-2 col-form-label text-md-right">{{ __('Phone') }}</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="phone" placeholder="Member Phone"
                                value="{{old('phone')}}">
                            @if($errors->has('phone'))
                            <span class="text-danger font-weight-bold">
                                {{$errors->first('phone')}}
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
                                @if($item->photo_for_what == 'Member')
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
                        <label for="address" class="col-md-2 col-form-label text-md-right">{{ __('Address') }}</label>
                        <div class="col-md-8">

                            <textarea rows="3" class="form-control summernote" name="address"
                                placeholder="Member Address">{{strip_tags(old('address'))}}</textarea>
                            @if($errors->has('address'))
                            <span class="text-danger font-weight-bold">
                                {{$errors->first('address')}}
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="text" class="col-md-2 col-form-label text-md-right">{{ __('Description') }}</label>
                        <div class="col-md-8">

                            <textarea rows="10" class="form-control" name="description" id="summernote"
                                placeholder="Member Description">{{strip_tags(old('description'))}}</textarea>
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
    $('#summernote').summernote({
        placeholder: 'Member Description',
        tabsize: 2,
        height: 120,
        toolbar: [
    // ['style', ['style']],
    ['font', ['bold', 'underline', 'clear']],
    ['para', ['ul', 'ol']],
    // ['table', ['table']],
    // ['insert', ['picture']],
    ['view', ['fullscreen', 'help']]
        ]
    });

    $('.summernote').summernote({
        placeholder: 'Member Address',
        tabsize: 2,
        height: 120,
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