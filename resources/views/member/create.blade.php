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
                        <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="mem_name" placeholder="Member Name" required>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('Email') }}</label>
                        <div class="col-md-6">
                            <input type="email" class="form-control" name="mem_email" placeholder="Member Email"
                                required>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('University') }}</label>
                        <div class="col-md-6">
                            <select name="uni_id" id="" class="form-control" required>
                                <option> Select University</option>
                                @foreach ($uni as $item)
                                <option value="{{$item->id}}">{{$item->uni_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('Positon') }}</label>
                        <div class="col-md-6">
                            <select name="res_id" id="" class="form-control" required>
                                <option> Select Position</option>
                                @foreach ($res as $item)
                                <option value="{{$item->id}}">{{$item->res_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="age" class="col-md-3 col-form-label text-md-right">{{ __('Born') }}</label>
                        <div class="col-md-6">
                            <input type="date" class="form-control" name="mem_age" required>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="phone" class="col-md-3 col-form-label text-md-right">{{ __('Phone') }}</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="mem_phone" placeholder="Member Phone"
                                required>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('Photo') }}</label>
                        <div class="col-md-6">
                            <select name="photo_id" id="" class="form-control" required>
                                <option> Select Photo</option>
                                @foreach ($photo as $item)
                                @if($item->photo_for_what == 'Member')
                                <option value="{{$item->id}}">{{$item->photo_name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="address" class="col-md-3 col-form-label text-md-right">{{ __('Address') }}</label>
                        <div class="col-md-6">
                            <textarea rows="3" class="form-control" name="mem_address" placeholder="Member Address"
                                required></textarea>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="text" class="col-md-3 col-form-label text-md-right">{{ __('Description') }}</label>
                        <div class="col-md-6">
                            <textarea rows="10" class="form-control" name="mem_description"
                                placeholder="Member Description" required></textarea>
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