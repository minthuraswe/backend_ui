@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row p-4 mt-2">
        <div class="col-md-12">
            <h2>Editing Member</h2>
            <div class="card">
                <form action="{{url('member/' . $mem->id )}}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="form-group row mt-3">
                        <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Name') }}</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="mem_name" placeholder="Member Name"
                                value="{{$mem->mem_name}}" required>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('Email') }}</label>
                        <div class="col-md-8">
                            <input type="email" class="form-control" name="mem_email" placeholder="Member Email"
                                value="{{$mem->mem_email}}" required>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('University') }}</label>
                        <div class="col-md-8">
                            <select name="uni_id" id="" class="form-control" required>
                                <option value=""> Select University</option>
                                @foreach ($uni as $data)
                                @if ($data->id == $mem->uni_id)
                                <option value="{{$data->id}}" selected="selected">
                                    {{$data->uni_name}}</option>
                                @else
                                <option value="{{$data->id}}">
                                    {{$data->uni_name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('Position') }}</label>
                        <div class="col-md-8">
                            <select name="res_id" id="" class="form-control" required>
                                <option value="">Select Position</option>
                                @foreach ($res as $data)
                                @if ($data->id == $mem->res_id)
                                <option value="{{$data->id}}" selected="selected">
                                    {{$data->res_name}}</option>
                                @else
                                <option value="{{$data->id}}">
                                    {{$data->res_name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="age" class="col-md-2 col-form-label text-md-right">{{ __('Born') }}</label>
                        <div class="col-md-8">
                            <input type="date" class="form-control" name="mem_age" value="{{$mem->mem_age}}" required>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="phone" class="col-md-2 col-form-label text-md-right">{{ __('Phone') }}</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="mem_phone" placeholder="Member Phone"
                                value="{{$mem->mem_phone}}" required>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('Photo') }}</label>
                        <div class="col-md-8">
                            <select name="photo_id" id="" class="form-control" required>

                                <option value=""> Select Photo</option>
                                @foreach ($photo as $item)
                                @if($item->photo_for_what == 'Member')
                                @if ($item->id == $mem->photo_id)
                                <option value="{{$item->id}}" selected>
                                    {{$item->photo_name}}</option>
                                @else
                                <option value="{{$item->id}}">
                                    {{$item->photo_name}}</option>
                                @endif
                                @endif
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="address" class="col-md-2 col-form-label text-md-right">{{ __('Address') }}</label>
                        <div class="col-md-8">
                            <textarea name="mem_address" placeholder="Member Address" required>
                                {!!$mem->mem_address!!}
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="description"
                            class="col-md-2 col-form-label text-md-right">{{ __('Description') }}</label>
                        <div class="col-md-8">
                            <textarea name="mem_description" placeholder="Member Description" required>
                                {!!$mem->mem_description!!}
                            </textarea>
                        </div>
                    </div>
                    <div class="row form-group mt-3 justify-content-center">
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-success mr-2">Update</button>
                            <a href="{{url('/member')}}" class="btn btn-secondary">Cancel</a>
                        </div>
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