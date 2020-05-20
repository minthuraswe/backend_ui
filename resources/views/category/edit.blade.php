@extends('dashboard')
@section('content')
    <div class="container">
        <div class="row p-4 mt-2">
            <div class="col-md-12">
                <h2>Editing Category</h2>
                <div class="card">
                    <form action="{{url('category/' . $cat->id )}}" method="post">
                        @method('PUT')
                        @csrf
                            <div class="form-group row mt-3">
                                <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Add New Responsible') }}</label>
    
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="cat_name" value="{{$cat->cat_name}}" required>
                            </div>
                            <button type="submit" class="btn btn-success mr-2">Update</button>
                            <a href="{{url('/category')}}" class="btn btn-secondary">Cancel</a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection