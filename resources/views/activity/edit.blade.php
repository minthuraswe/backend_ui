@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row p-4 mt-2">
        <div class="col-md-12">
            <h2>Editing Activity</h2>

            <div class="card">
                <form action="{{url('activity/'. $act->id)}}" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                    @method('PUT')
                    @csrf
                    <div class="form-group row mt-3">
                        <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Name') }}</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="act_name" placeholder="Activity Name"
                                value="{{$act->act_name}}" required>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('Category') }}</label>
                        <div class="col-md-8">
                            <select name="cat_id" id="" class="form-control" required>
                                <option value=""> Select Category</option>
                                @foreach ($cat as $item)
                                @if($item->id == $act->cat_id)
                                <option value="{{$item->id}}" selected="selected">{{$item->cat_name}}</option>
                                @else
                                <option value="{{$item->id}}">{{$item->cat_name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="text" class="col-md-2 col-form-label text-md-right">{{ __('Image') }}</label>
                        <div class="col-md-8">
                            <input type="file" multiple class="form-control" id="validatedCustomFile"
                                name="memory[]" required>
                            @foreach(unserialize($act->act_memory) as $data)
                            <img src="{{asset('/uploads/'. $data)}}" width="40px" height="40px" class="rounded mt-2"
                                title="{{$data}}">
                            @endforeach
                        </div>
                    </div>
                    <div class="row form-group mt-3 justify-content-center">
                        <div class="col-md-8">
                            <a href="{{url('/activity')}}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-success mr-2">Update</button>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection