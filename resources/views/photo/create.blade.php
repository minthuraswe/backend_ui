@extends('dashboard')
@section('content')
<div class="container">
    <div class="row p-4 mt-2">
        <div class="col-md-12">
            <div class="d-flex">
                <div>
                    <h2>Add New Photo</h2>
                </div>
                <div class="ml-auto">
                    <a href="{{url('/photo')}}" class="btn btn-primary mb-3 p-2">Click Here To Go Back</a>
                </div>
            </div>

            <div class="card">
                <form action="{{url('/photo')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row mt-3">
                        <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="photo_name" placeholder="Photo Name" required>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="text" class="col-md-3 col-form-label text-md-right">{{ __('Photo') }}</label>
                        <div class="col-md-6">
                            <input type="file" class="form-control" id="validatedCustomFile" name="image" required>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="email"
                            class="col-md-3 col-form-label text-md-right">{{ __('Phot For What') }}</label>
                        <div class="col-md-6">
                            <select name="photo_for_what" id="" class="form-control" required>
                                <option> Select Category</option>
                                <option>Activity</option>
                                <option>Member</option>
                                <option>News</option>
                            </select>
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