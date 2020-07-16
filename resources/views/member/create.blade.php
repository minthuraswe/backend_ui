@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row p-4 mt-2">
        <div class="col-md-12">
            <div class="d-flex">
                <div>
                    <h2>Creating Member</h2>
                </div>
                <div class="ml-auto">
                    <a href="{{url('/member')}}" class="btn btn-primary mb-3 p-2">Back</a>
                </div>
            </div>
            <div class="card">
                <form action="{{url('/member')}}" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
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
                                <option {{old('university') == 'Yangon University' ? 'selected' : ''}}>Yangon University</option>
                                <option {{old('university') == 'West Yangon University' ? 'selected' : ''}}>West Yangon University</option>
                                <option {{old('university') == 'Technological University(Hmawbi)' ? 'selected' : ''}}>Technological University(Hmawbi)</option>
                                <option {{old('university') == 'West Yangon Technological University' ? 'selected' : ''}}>West Yangon Technological University</option>
                                <option {{old('university') == 'Yangon University of Economics' ? 'selected' : ''}}>Yangon University of Economics</option>
                            </select>
                            @if($errors->has('university'))
                            <span class="text-danger font-weight-bold">
                                {{$errors->first('university')}}
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="text" class="col-md-2 col-form-label text-md-right">{{ __('Position') }}</label>
                        <div class="col-md-8">
                            <select name="position" class="form-control">
                                <option value=""> Select Position</option>
                                <option {{old('position') == 'President' ? 'selected' : ''}}>President</option>
                                <option {{old('position') == 'Vice-President' ? 'selected' : ''}}>Vice-President</option>
                                <option {{old('position') == 'Generally Secretary' ? 'selected' : ''}}>Generally Secretary</option>
                                <option {{old('position') == 'Associate General Secretary' ? 'selected' : ''}}>Associate General Secretary</option>
                                <option {{old('position') == 'Treasure-Fund Raising' ? 'selected' : ''}}>Treasure-Fund Raising</option>
                                <option {{old('position') == 'Joint Treasure-Fund Raising' ? 'selected' : ''}}>Joint Treasure-Fund Raising</option>
                                <option {{old('position') == 'Culture Leader' ? 'selected' : ''}}>Culture Leader</option>
                                <option {{old('position') == 'Literature and Communication Leader' ? 'selected' : ''}}>Literature and Communication Leader</option>
                                <option {{old('position') == 'Sport Leader' ? 'selected' : ''}}>Sport Leader</option>
                            </select>
                            @if($errors->has('position'))
                            <span class="text-danger font-weight-bold">
                                {{$errors->first('position')}}
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="text" class="col-md-2 col-form-label text-md-right">{{ __('Year of Service') }}</label>
                        <div class="col-md-8">
                            <select name="yearofservice" id="" class="form-control">
                                <option value=""> Select Year of service</option>
                                @foreach ($yearofservice as $getyear)
                                @if(Request::old('yearofservice') == $getyear->id)
                                <option value="{{$getyear->id}}" selected>{{$getyear->start_year}}-{{$getyear->end_year}}</option>
                                @else
                                <option value="{{$getyear->id}}">{{$getyear->start_year}}-{{$getyear->end_year}}</option>
                                @endif
                                @endforeach
                            </select>
                            @if($errors->has('yearofservice'))
                            <span class="text-danger font-weight-bold">
                                {{$errors->first('yearofservice')}}
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
                            <input type="file" name="photo" class="form-control">   
                            @if($errors->has('photo'))
                            <span class="text-danger font-weight-bold">
                                {{$errors->first('photo')}}
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="text" class="col-md-2 col-form-label text-md-right">{{ __('Facebook Link') }}</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="link" placeholder="Member Link"
                                value="{{old('link')}}">
                                <small class="text-muted">Optional(you can skip)</small>
                            </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="address" class="col-md-2 col-form-label text-md-right">{{ __('Address') }}</label>
                        <div class="col-md-8">

                            <textarea  name="address" placeholder="Member Address">
                                {{old('address')}}
                            </textarea>
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
                            <textarea name="description" placeholder="Member Description">
                                {{old('description')}}
                            </textarea>
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
    tinymce.init({
        selector: 'textarea',
        height: 260,
    }); 
</script>
@endpush