@extends('layouts.master')
@section('content')
<section>
    <div class="container py-3 px-3">
        <div class="row mb-2">
            <div class="col-md-12">
                <div class="card p-3 shadow">
                    <form enctype="multipart/form-data" action="{{url('ads/' . $ads->id)}}" method="POST" accept-charset="UTF-8">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="file">Add Your Ads file</label>
                            <input type="file" class="form-control mb-2" name="ads" required>
                            <img src="{{asset('/uploads/'. $ads->image)}}" width="150px" height="30px" title="{{$ads->image}}">
                        </div>
                        <div class="form-group">
                            <label for="text">Add Your Ads link</label>
                            <input type="text" class="form-control" name="link" value="{{$ads->link}}" required>
                        </div>
                        <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="place" id="inlineRadio1" value="ads-top" {{$ads->checkpaid == 'ads-top' ? 'checked' : ''}}>
                            <label class="form-check-label" for="inlineRadio1">ads-top</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="place" id="inlineRadio1" value="ads-bottom" {{$ads->checkpaid == 'ads-bottom' ? 'checked' : ''}}>
                            <label class="form-check-label" for="inlineRadio1">ads-bottom</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="place" id="inlineRadio1" value="ads-news" {{$ads->checkpaid == 'ads-news' ? 'checked' : ''}} >
                            <label class="form-check-label" for="inlineRadio1">ads-news</label>
                        </div>
                        </div>
                        <div class="mt-3">
                            <a href="/ads" class="btn btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection