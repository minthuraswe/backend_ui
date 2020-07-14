@extends('layouts.master')
@section('content')
<section>
    <div class="container px-3 py-3">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card p-3 shadow">
                    <form action="{{url('yearofservice/' . $yearofservice->id)}}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="text">Start Year</label>
                            <input type="text" class="form-control" name="startyear" value="{{$yearofservice->start_year}}" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="text">End Year</label>
                            <input type="text" class="form-control" name="endyear" value="{{$yearofservice->end_year}}">
                        </div>
                        <div class="float-right">
                        <a href="/yearofservice" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection