@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row p-4 mt-2">
        <div class="col-md-12">
            <h2>Editing Member</h2>
            <div class="card">
                <form action="{{url('member/' . $mem->id )}}" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                    @method('PUT')
                    @csrf
                    <div class="form-group row mt-3">
                        <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Name') }}</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="name" placeholder="Member Name"
                                value="{{$mem->mem_name}}" required>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('Email') }}</label>
                        <div class="col-md-8">
                            <input type="email" class="form-control" name="email" placeholder="Member Email"
                                value="{{$mem->mem_email}}" required>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('University') }}</label>
                        <div class="col-md-8">
                            <select name="university" id="" class="form-control" required>
                                <option value="">Select University</option>
                                <option {{$mem->mem_university == "Yangon University" ? 'selected' : ''}}>Yangon University</option>
                                <option {{$mem->mem_university == "West Yangon University" ? 'selected' : ''}}>West Yangon University</option>
                                <option {{$mem->mem_university == "Technological University(Hmawbi)" ? 'selected' : ''}}>Technological University(Hmawbi)</option>
                                <option {{$mem->mem_university == "West Yangon Technological University" ? 'selected' : ''}}>West Yangon Technological University</option>
                                <option {{$mem->mem_university == "Yangon University of Economics" ? 'selected' : ''}}>Yangon University of Economics</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('Position') }}</label>
                        <div class="col-md-8">
                            <select name="position" id="" class="form-control" required>
                                <option value=""> Select Position</option>
                                <option {{$mem->mem_position == "President" ? 'selected' : ''}}>President</option>
                                <option {{$mem->mem_position == "Vice-President" ? 'selected' : ''}}>Vice-President</option>
                                <option {{$mem->mem_position == "Generally Secretary" ? 'selected' : ''}}>Generally Secretary</option>
                                <option {{$mem->mem_position == "Associate General Secretary" ? 'selected' : ''}}>Associate General Secretary</option>
                                <option {{$mem->mem_position == "Treasure-Fund Raising" ? 'selected' : ''}}>Treasure-Fund Raising</option>
                                <option {{$mem->mem_position == "Joint Treasure-Fund Raising" ? 'selected' : ''}}>Joint Treasure-Fund Raising</option>
                                <option {{$mem->mem_position == "Culture Leader" ? 'selected' : ''}}>Culture Leader</option>
                                <option {{$mem->mem_position == "Literature and Communication Leader" ? 'selected' : ''}}>Literature and Communication Leader</option>
                                <option {{$mem->mem_position == "Sport Leader" ? 'selected' : ''}}>Sport Leader</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="text" class="col-md-2 col-form-label text-md-right">{{ __('Year Of Service') }}</label>
                        <div class="col-md-8">
                            <select name="yearofservice" id="" class="form-control" required>
                                <option> Select Year of service</option>
                                @foreach ($yearofservice as $getyear)
                                @if($getyear->id == $mem->year_id)
                                <option value="{{$getyear->id}}" selected="selected">{{$getyear->start_year}}-{{$getyear->end_year}}</option>
                                @else
                                <option value="{{$getyear->id}}">{{$getyear->start_year}}-{{$getyear->end_year}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="age" class="col-md-2 col-form-label text-md-right">{{ __('Born') }}</label>
                        <div class="col-md-8">
                            <input type="date" class="form-control" name="age" value="{{$mem->mem_age}}" required>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="phone" class="col-md-2 col-form-label text-md-right">{{ __('Phone') }}</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="phone" placeholder="Member Phone"
                                value="{{$mem->mem_phone}}" required>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('Photo') }}</label>
                        <div class="col-md-8">
                            <input type="file" name="photo" class="form-control" required>
                            <img src="{{asset('/uploads/'. $mem->mem_photo)}}" class="rounded mt-2" title="{{$mem->mem_photo}}" width="50px" height="50px">
                        </div>
                    </div>
                    
                    <div class="form-group row mt-3">
                        <label for="text" class="col-md-2 col-form-label text-md-right">{{ __('Facebook Link') }}</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="link" placeholder="Member Link"
                                value="{{$mem->mem_link}}">
                                <small class="text-muted">Optional(you can skip)</small>
                            </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="address" class="col-md-2 col-form-label text-md-right">{{ __('Address') }}</label>
                        <div class="col-md-8">
                            <textarea name="address" placeholder="Member Address" required>
                                {!!$mem->mem_address!!}
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="description"
                            class="col-md-2 col-form-label text-md-right">{{ __('Description') }}</label>
                        <div class="col-md-8">
                            <textarea name="description" placeholder="Member Description" required>
                                {!!$mem->mem_description!!}
                            </textarea>
                        </div>
                    </div>
                    <div class="row form-group mt-3 justify-content-center">
                        <div class="col-md-8">
                            <a href="{{url('/member')}}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-success mr-2">Update</button>
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