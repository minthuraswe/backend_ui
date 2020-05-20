@extends('dashboard')
@section('content')
    <div class="container">
        <div class="row p-4 mt-2">
            <div class="col-md-12">
                <h2>Editing Activity</h2>
               
                <div class="card">
                    <form action="{{url('activity/'. $act->id)}}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                            <div class="form-group row mt-3">
                                <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="act_name" placeholder="Activity Name"
                                    value="{{$act->act_name}}" required>
                            </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('Photo') }}</label>
                                <div class="col-md-6">
                                <select name="photo_id" id="" class="form-control"  required >
                                    <option> Select Photo</option>
                                     @foreach ($photo as $item)
                                     @if($item->photo_for_what == 'Activity')
                                        @if($item->id == $act->photo_id)
                                            <option value="{{$item->id}}" selected="selected">{{$item->photo_name}}</option>
                                        @else
                                            <option value="{{$item->id}}">{{$item->photo_name}}</option>
                                        @endif
                                     @endif                               
                                     @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('Category') }}</label>
                                <div class="col-md-6">
                                <select name="cat_id" id="" class="form-control"  required >
                                    <option> Select Category</option>
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
                                <label for="text" class="col-md-3 col-form-label text-md-right">{{ __('Memory') }}</label>
                            <div class="col-md-6">
                                <input type="file" multiple  class="form-control" id="validatedCustomFile" name="act_memory" required>
                            {{-- <input type="hidden" name="image" value="{{ $photo->image }}" />  --}}
                            </div>
                            </div>
                            <div class="row form-group mt-3 justify-content-center">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-success mr-2">Update</button>
                                    <a href="{{url('/activity')}}" class="btn btn-secondary">Cancel</a>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection