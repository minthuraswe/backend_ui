@extends('dashboard')
@section('content')
<div class="container">
    <div class="row p-4 mt-2">
        <div class="col-md-12">
            <div class="d-flex">
                <div><h2>Creating Responsible</h2></div>
                <div class="ml-auto">
                    <a href="{{url('/responsible')}}" class="btn btn-primary mb-3 p-2">Click Here To Go Back</a>
                </div>
            </div>
          
            <div class="card">
                <form action="{{url('/responsible')}}" method="post">
                    @csrf
                        <div class="form-group row mt-3">
                            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Add New Responsible') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name">
                            @if($errors->has('name'))
                            <span class="text-danger font-weight-bold">
                                {{$errors->first('name')}}
                            </span>
                            @endif
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection