@extends('dashboard')
@section('content')
<div class="container">
    <div class="row p-4 mt-2">
        <div class="col-md-12">
            <div class="d-flex">
                <div>
                    <h2>Editing Photo</h2>
                </div>

            </div>

            <div class="card">
                <form action="{{url('photo/'. $photo->id)}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group row mt-3">
                        <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="photo_name" placeholder="Photo Name"
                                value="{{$photo->photo_name}}" required>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="text" class="col-md-3 col-form-label text-md-right">{{ __('Photo') }}</label>
                        <div class="col-md-6">
                            <input type="file" class="form-control" id="validatedCustomFile" name="image" required>
                            {{-- <input type="hidden" name="image" value="{{ $photo->image }}" /> --}}
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="email"
                            class="col-md-3 col-form-label text-md-right">{{ __('Phot For What') }}</label>
                        <div class="col-md-6">
                            <select name="photo_for_what" id="" class="form-control" required>
                                <option> Choose Category</option>
                                <option {{$photo->photo_for_what == "Activity" ? 'selected' : ''}}>Activity</option>
                                <option {{$photo->photo_for_what == "Member" ? 'selected' : ''}}>Member</option>
                                <option {{$photo->photo_for_what == "News" ? 'selected' : ''}}>News</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group mt-3 justify-content-center">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success mr-2">Update</button>
                            <a href="{{url('/photo')}}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection