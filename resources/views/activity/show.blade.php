@extends('dashboard')
@section('content')
<div class="container">
    <div class="row p-4 mt-2">
        <div class="col-md-12">
            <div class="d-flex">
                <div>
                    <h2>Activity Details</h2>
                </div>
                <div class="ml-auto">
                    <a href="{{url('/activity')}}" class="btn btn-primary mb-3 p-2">Click Here To Go Back</a>
                </div>
            </div>
            <div class="card">
                <ul style="list-style:none;" class="p-0 mb-0">
                    <li class="pl-3 border-bottom py-2">
                        Name = {{$act->act_name}}
                    </li>
                    <li class="pl-3 border-bottom py-2">
                        <?php $cat = App\Category::find($act->cat_id); ?>
                        Category = {{$cat->cat_name}}
                    </li>
                    <li class="pl-3 border-bottom py-2">
                        <?php $photo = App\Phototitle::find($act->photo_id); ?>
                        Photo Heading = <img src="{{asset('/uploads/'. $photo->image)}}" width="auto" height="50px" title="{{$photo->image}}">
                    </li>
                    <li class="pl-3 border-bottom py-2">
                        Memories = 
                        @foreach(unserialize($act->act_memory) as $data)
                        <img src="{{asset('/uploads/'. $data)}}" width="50px" height="50px" class="rounded" title="{{$data}}">
                        @endforeach
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection